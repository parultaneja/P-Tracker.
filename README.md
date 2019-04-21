# P-Tracker
This project is majorly designed for respiratory and diabetes patients, as according to new researches, type II diabetes can be caused by air pollution. This device allows the patients to get aware of the air pollution indulgent and protect themselves from it. The main idea is to embed a device with a watch (P-band), P-Tracker on every street light to monitor the real time air quality index across the city/street and it comes with a deployed web application (for harmful gases involvement and prediction of pollution level as per user’s preference) and mobile application (user’s personal profile and tracking).


# Hardware Used
The hardware used in both P-Band and P-Tracker are :
1. DSM501A Sensor
2. Node MCU
3. GPS Module
4. Arduino Pro Mini 
5. OLED
6. Half Bread board
7. Vero board
8. Bluetooth Module.

# Algorithm Used For Prediction 
Recurrent Neural Network(RNN) are a type of Neural Network where the output from previous step are fed as input to the current step. In traditional neural networks, all the inputs and outputs are independent of each other, but in cases like when it is required to predict the next word of a sentence, the previous words are required and hence there is a need to remember the previous words. Thus RNN came into existence, which solved this issue with the help of a Hidden Layer. The main and most important feature of RNN is Hidden state, which remembers some information about a sequence.
 
RNN have a “memory” which remembers all information about what has been calculated. It uses the same parameters for each input as it performs the same task on all the inputs or hidden layers to produce the output. This reduces the complexity of parameters, unlike other neural networks.
Advantages of Recurrent Neural Network :
1.	An RNN remembers each and every information through time. It is useful in time series prediction only because of the feature to remember previous inputs as well. This is called Long Short Term Memory.
2.	Recurrent neural network are even used with convolutional layers to extend the effective pixel neighborhood.

# Model Used 
 Keras Sequential Model with 3 % data loss.
# Data Analysis 
Data of air pollution all over India of past 20 years is taken and with naïve forecasting with time series analysis we have done data analysis 
Forecasting-
Forecasting is a method that is used extensively in time series analysis to predict a response variable, such as monthly profits, stock performance, or unemployment figures, for a specified period of time. Forecasts are based on patterns in existing data. For example, a warehouse manager can model how much product to order for the next 3 months based on the previous 12 months of orders.

Naïve Forecasting-
In naive forecasting, the forecast for time t is the data value at time t-1. You can calculate naive forecasts with moving average by setting the moving average length to 1, or with single exponential smoothing by setting the weight to 1. You can use naive forecasting to establish a benchmark for your time series model. Compare the accuracy measures of the naive model and a model using a different method. If the naive model is a better fit, you shouldn't use the other model since the naive model is a better fit and is more simple.

Forecasts for a moving average analysis-
The fitted value at time t is the uncentered moving average at time t -1. The forecasts are the fitted values at the forecast origin. If you forecast 10 time units ahead, the forecasted value for each time will be the fitted value at the origin. Data up to the origin are used for calculating the moving averages.
You can use the linear moving averages method by calculating consecutive moving averages. The linear moving averages method is often used when there is a trend in the data. First, calculate and store the moving average of the original series. Then, calculate and store the moving average of the previously stored column to obtain a second moving average.
In naive forecasting, the forecast for time t is the data value at time t -1. Using moving average procedure with a moving average of length one gives naive forecasting.

Forecasts for a single exponential smoothing analysis-
The fitted value at time t is the smoothed value at time t-1. The forecasts are the fitted value at the forecast origin. If you forecast 10 time units ahead, the forecasted value for each time will be the fitted value at the origin. Data up to the origin are used for the smoothing.
In naive forecasting, the forecast for time t is the data value at time t-1. Perform single exponential smoothing with a weight of one to do naive forecasting.

We have done naive forcaste for SULPHOR DIOXIDE, NITROGEN DIOXIDE, MEAN VALUE OF NO2, RSPM Respirable Suspended Particulate Matter,SPM Suspended Particulate Matter and Air quality index of the biggest cities in India.  
# Libraries Used (Prediction)
1.	Numpy
2.	Tensorflow
3.	Matplotlib
4.	Pandas
5.	Seaborn
6.	Keras

# Libraries Used (Analysis)
1.	Numpy
2.	Matplotlib
3.	Pandas
4.	Seaborn

# Testing 
1. Clone the repository.
2. Install the dependencies.


# Copyright
See (https://github.com/shivamyth/P-Tracker/blob/master/LICENSE) for details. Copyright (c) 2019



