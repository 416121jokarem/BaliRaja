# -*- coding: utf-8 -*-
"""
Created on Fri May  8 20:16:57 2020

@author: Mahesh Jokare (MJ)
"""
import pandas as pd
import numpy as np
from sklearn.ensemble import StackingClassifier
from sklearn.ensemble import RandomForestClassifier
from sklearn.linear_model import LogisticRegression
from sklearn.naive_bayes import GaussianNB
from sklearn.tree import DecisionTreeClassifier
import pickle

df = pd.read_csv(r'E:\Project\data\merged.csv')

test=pd.DataFrame(columns=df.columns)
train=pd.DataFrame(columns=df.columns)

for group,gata in df.groupby('Crop'):
    p2=len(gata)//4 #20% of data goes to test
    train=train.append(gata.iloc[p2:,:])
    test=test.append(gata.iloc[:p2,:])
    
ltrain=train["Crop"]
ltrain=ltrain.to_numpy(dtype=np.int)

train=train.drop(["Crop"],axis=1)
train=train.to_numpy(dtype=np.int)
#print(train)
ltest=test["Crop"]
ltest=ltest.to_numpy(dtype=np.int)

test=test.drop(["Crop"],axis=1)
test=test.to_numpy(dtype=np.int)

estimators = [('rf', RandomForestClassifier(n_estimators=10, random_state=0)),('lr',LogisticRegression()),('gnb', GaussianNB())]
stkclf = StackingClassifier(estimators=estimators, final_estimator=DecisionTreeClassifier())
stkclf.fit(train,ltrain)
output=stkclf.predict(test)
from sklearn.metrics import precision_score
from sklearn.metrics import recall_score
from sklearn.metrics import f1_score
from sklearn.metrics import accuracy_score
from sklearn.metrics import roc_auc_score

precision = precision_score(ltest, output)
print('Precision: %.3f' % precision)
recall = recall_score(ltest, output)
print('Recall: %.3f' % recall)
score = f1_score(ltest, output)
print('F-Measure: %.3f' % score)
accuracy = accuracy_score(ltest, output)
print('Accuracy: %.3f' % accuracy)
auc = roc_auc_score(ltest, output)
print('AUC score: %.3f' % auc)

#stkclf.score(test,ltest)
pickle.dump(stkclf, open('Irrigated.pkl','wb'))
model = pickle.load(open('Irrigated.pkl','rb'))
print(model.predict([[3,5,33,100,50,50,6,8]]))  #list of list and pass it as per sequence
 