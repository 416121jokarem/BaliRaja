# -*- coding: utf-8 -*-
"""
Created on Wed May 27 14:53:16 2020

@author: Mahesh Jokare (MJ)
"""

import pandas as pd
import numpy as np
import pickle


month={1:"Jan-Feb",2:"Jan-Feb",3:"Mar-May",4:"Mar-May",5:"Mar-May",6:"Jun-Sep",7:"Jun-Sep",8:"Jun-Sep",9:"Jun-Sep",10:"Oct-Dec",11:"Oct-Dec",12:"Oct-Dec"}

df = pd.read_csv(r'data\NonIrrigated.csv')
rn = pd.read_csv('data\Rainfall.csv')
state="ARUNACHAL PRADESH"
dist="LOW SUBANSIRI"
mon=12


mon = month[mon]
rowData = rn.loc[ : , ["STATE_UT_NAME","DISTRICT","ANNUAL",mon] ]
rowslice = rowData[(rowData.STATE_UT_NAME.str.contains(state.upper()))]

Minrainfall=int(rowslice[mon].mean())
MaxRainfall=int(rowslice["ANNUAL"].mean())
#print(MaxRainfall)
#print(Minrainfall)
for i,j in rowData.iterrows():
    if j["STATE_UT_NAME"]== state.upper() and j["DISTRICT"]==dist.upper():
        Minrainfall=j[mon]
        MaxRainfall=j["ANNUAL"]
print(MaxRainfall)
print(Minrainfall)
crop=[]
info=[]
cropdata=df.loc[:,["RAINFALL min","RAINFALL max","Crop"]]
for i,j in cropdata.iterrows():
    #if  Minrainfall<=j["RAINFALL min"] and  MaxRainfall<=j["RAINFALL max"]:
    if (Minrainfall>=j["RAINFALL min"] and  MaxRainfall<=j["RAINFALL max"]):
        print("feh")
        crop.append(j["Crop"])
    #if j["RAINFALL min"]<=Minrainfall and j["RAINFALL max"]>=MaxRainfall:



#print(crop)
#print(len(crop))

from sklearn import tree

model = tree.DecisionTreeClassifier()

train=df.loc[:,["RAINFALL min","RAINFALL max"]]
train=train.to_numpy(dtype=np.str)

ltrain=df.loc[:,["Crop"]]
ltrain=ltrain.to_numpy(dtype=np.str)
 
model.fit(train,ltrain)
pickle.dump(model, open('NonIrrigated.pkl','wb'))
model = pickle.load(open('NonIrrigated.pkl','rb'))
print(model.predict([[200,700]]))
'''test=pd.DataFrame([[Minrainfall , MaxRainfall]])
test=test.to_numpy(dtype=np.str)    
'''
