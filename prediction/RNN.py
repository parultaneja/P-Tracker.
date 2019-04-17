########### RNN ########
import numpy as np
import pandas as pd
from sklearn.impute import SimpleImputer
from sklearn.preprocessing import MinMaxScaler
from keras.models import Sequential
from keras.layers import Dense, Dropout, LSTM
import csv

### Data Preprocessing
dataset2016 = pd.read_csv('Data/NewDelhi_PM2.5_2016_YTD.csv')
dataset2017 = pd.read_csv('Data/NewDelhi_PM2.5_2017_YTD.csv')
dataset2018 = pd.read_csv('Data/NewDelhi_PM2.5_2018_YTD.csv')
dataset = pd.concat([dataset2016, dataset2017, dataset2018])
train = dataset.iloc[:, 1:2].values

        
simputer = SimpleImputer()
train = simputer.fit_transform(train)

## Feature scaling
sc = MinMaxScaler(feature_range=(0,1))
train_scaled = sc.fit_transform(train)

## create datastructure for 60 time steps and 1 output
X_train = []
Y_train = []
for i in range(60,26192):
    X_train.append(train_scaled[i-60:i, 0])
    Y_train.append(train_scaled[i,0])
X_train, Y_train = np.array(X_train), np.array(Y_train)    
X_train = np.reshape(X_train, (X_train.shape[0], X_train.shape[1], 1))

## Model
model = Sequential()
model.add(LSTM(units = 50, return_sequences=True, input_shape = (X_train.shape[1], 1)))
model.add(Dropout(0.2))
model.add(LSTM(units = 50, return_sequences=True))
model.add(Dropout(0.2))
model.add(LSTM(units = 50, return_sequences=True))
model.add(Dropout(0.2))
model.add(LSTM(units = 50))
model.add(Dense(units=1))
model.compile(optimizer = 'adam', loss = 'mean_squared_error')
## Try with having optimizer = 'RMSprop' 
#model.compile(optimizer = 'RMSprop', loss = 'mean_squared_error')
result = model.fit(X_train, Y_train, epochs = 5, batch_size = 32)
print(result.history['loss'])  #With adam loss=20% approx, try with RMSProp
#print(result.history['acc'])

##### Predicting ####
dataset2019 = pd.read_csv('Data/NewDelhi_PM2.5_2019_YTD.csv')

test = dataset2019.iloc[:, 1:2].values

test = simputer.transform(test)

real_PM = test
dataset_total = pd.concat((dataset2018['AQI'], dataset2019['AQI']), axis = 0)
dataset_test = dataset_total[len(dataset_total)-len(dataset2019)-60 :].values
dataset_test = dataset_test.reshape(-1,1)


dataset_test = simputer.transform(dataset_test)
dataset_test = sc.transform(dataset_test)
X_test = []
for i in range(60,8648):
    X_test.append(train_scaled[i-60:i, 0])
X_test = np.array(X_test)    
X_test = np.reshape(X_test, (X_test.shape[0], X_test.shape[1], 1))
predicted_PM = model.predict(X_test)
predicted_PM = sc.inverse_transform(predicted_PM)


