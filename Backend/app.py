import numpy as np
from flask import Flask, request, jsonify, render_template
import pickle
import pandas as pd
app = Flask(__name__)
model = pickle.load(open('Irrigated.pkl', 'rb'))
model1 = pickle.load(open('NonIrrigated.pkl', 'rb'))
@app.route('/IrrigatedCrop',methods=['POST'])
def predict():
    print("Iriigated")
    month={"January":1,"February":2,"March":3,"April":4,"May":5,"June":6,"July":7,"August":8,"September":9,"October":10,"November":11,"December":12}
    soil={"Alluvial":3,"Red":2,"Black":1,"Mountain":6,"Laterite":5,"Desert":4}
    crop = {1:"Rice",2: "Wheat",3: "Cotton",4:"Sugarcane",5: "Tea",6: "Ragi",7: "Maize",8: "Millet",9: "Barley",10:"Jawar",11:"PigeonPea",12:"ChickPea",13: "Tomato",14:"Brinjal",15:"Chilli",16: "Onion",17:"Garlic",18:"Okra",19: "Safflower",20:"Sunflower",21:"Potato"}
    data = request.get_json()
    print(data)
    Soil=soil[data['Soil']]
    Month=month[data['Month']]
    input=[]
    input.append(Soil)
    input.append(Month)
    input.append(int(data['State']))
    input.append(data['N'])
    input.append(data['P'])
    input.append(data['K'])
    input.append(float(data['MinpH']))
    input.append(float(data['MaxpH']))
    print(input)
    prediction = model.predict([np.array(input)])
    print(prediction)
    output=crop[int(prediction[0])]
    print(output)
    return jsonify(output)
@app.route('/NonIrrigatedCrop',methods=['POST'])
def predict1():
    month={1:"Jan-Feb",2:"Jan-Feb",3:"Mar-May",4:"Mar-May",5:"Mar-May",6:"Jun-Sep",7:"Jun-Sep",8:"Jun-Sep",9:"Jun-Sep",10:"Oct-Dec",11:"Oct-Dec",12:"Oct-Dec"}
    month1 = {"January": 1, "February": 2, "March": 3, "April": 4, "May": 5, "June": 6, "July": 7, "August": 8,
             "September": 9, "October": 10, "November": 11, "December": 12}
    rn = pd.read_csv('data\Rainfall.csv')
    df = pd.read_csv(r'data\NonIrrigated.csv')
    state = {1:"Andaman and Nicobar Island (UT)",2:"Andhra Pradesh",3:"Arunachal Pradesh",4: "Assam",5: "Bihar",6:"Chandigarh (UT)",7:"Chhattisgarh",8:"Dadra and Nagar Haveli (UT)",9:"Daman and Diu (UT)",10:"Delhi (NCT)",11:"Goa",12: "Gujarat",13: "Haryana",14: "Himachal Pradesh",
            15:"Jammu and Kashmir",16: "Jharkhand",17: "Karnataka",18: "Kerala",19:"Lakshadweep (UT)",20: "Madhya Pradesh",21: "Maharashtra",22:"Manipur",23:"Meghalaya",24:"Mizoram",25:"Nagaland",26: "Odisha",27:"Puducherry (UT)",28: "Punjab",
            30:"Sikkim",31: "Tamil Nadu",32:"Telangana",33:"Tripura",34: "Uttarakhand",35: "Uttar Pradesh",36: "West Bengal"}
    data = request.get_json()
    state=state[int(data['State'])]
    dist=data['District']
    mon=month1[data['Month']]
    mon = month[mon]
    print(mon)
    rowData = rn.loc[ : , ["STATE_UT_NAME","DISTRICT","ANNUAL",mon] ]
    rowslice = rowData[(rowData.STATE_UT_NAME.str.contains(state.upper()))]
    Minrainfall=rowslice[mon].mean()
    print(Minrainfall)
    MaxRainfall=rowslice["ANNUAL"].mean()
    for i,j in rowData.iterrows():
        if j["STATE_UT_NAME"]== state.upper() and j["DISTRICT"]==dist.upper():
            Minrainfall=j[mon]
            MaxRainfall=j["ANNUAL"]
    crop=[]
    print(Minrainfall)
    print(MaxRainfall)
    cropdata=df.loc[:,["RAINFALL min","RAINFALL max","Crop"]]
    for i,j in cropdata.iterrows():
        if j["RAINFALL min"]<=Minrainfall and j["RAINFALL max"]>=MaxRainfall:
            crop.append(j["Crop"])
    print("Non")
    print(crop)
    data = request.get_json()
    if len(crop)>0:
        prediction=crop
    else:
        prediction = model1.predict([[Minrainfall,MaxRainfall]])
    print(prediction)
    output = prediction
    print(len(output))
    if(len(output)==1):
        o=prediction[0]
        print(output)
        return jsonify(output.tolist(),o)
    str1 = " "
    o=str1.join(prediction)
    print(o)
    print(output)
    #print(jsonify(o,output))
    return jsonify(output,o)
if __name__ == "__main__":
    app.run(debug=True)
