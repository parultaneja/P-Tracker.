import urllib.request
import csv
import json
import pandas as pd

def writeTOJSONFile(path,fileName,data):
    filePathNameWExt = './'+path+'/'+fileName+'.json'
    with open(filePathNameWExt,'w') as fp:
        json.dump(data,fp)
response=urllib.request.urlopen("http://ptrackr.000webhostapp.com/data.php")
content=response.read()
data=json.loads(content.decode("utf8"))
path='./'
fileName = 'aqi'
writeTOJSONFile(path,fileName,data)

df=pd.read_json("aqi.json").to_csv("aqi.csv")

