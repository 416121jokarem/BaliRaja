import requests
import time
import csv
from _datetime import datetime,timedelta
from datetime import date
from googletrans import Translator
import pymysql
import schedule

translator = Translator()
today = date.today()
x=datetime.today()
nextday=x.replace(day=x.day, hour=1, minute=0, second=0, microsecond=0) + timedelta(days=1)

print(nextday)
duartion={}
with open("data/DurationOfCrop.csv", 'r', encoding="utf8") as cf:
    csvreader = list(csv.reader(cf))
    for i in range(1,len(csvreader)):
        duartion[csvreader[i][0]]=csvreader[i][1]
record_dict = {}
#send sms
def sendSMS(apikey, numbers, sender, message):
    url = "https://www.fast2sms.com/dev/bulk"
    querystring = {"authorization": "18xfwhbYqHj7d2mzKUFrTyAtR3WVG0PODCuEvBiZag9ce46QIkp3lsTcFBDItdbXCGHfm04AZO5xw9vY", "sender_id": "FSTSMS", "message": message+"",
                   "language": "unicode", "route": "p", "numbers": numbers}
    print(querystring)
    headers = {
        'cache-control': "no-cache"
    }
    response = requests.request("GET", url, headers=headers, params=querystring)
    return response.text

def farmerAlert(cropid,pest,treatment,duration,district):
    #print("in farmer alert"+pest)
    cropQ="SELECT distinct f.farmer_id,f.mobile_no,f.farmer_name,f.language,f.district,c.farmer_id,c.crop_name from farmer_details as f, crop_details as c WHERE f.farmer_id=c.farmer_id and outdated='No' and crop_name='"+cropid+"'and f.district ='"+district+"';"
    farmerCursor.execute(cropQ)
    result=farmerCursor.fetchall()
    #print("farmer details")
    #print(result)
    #print("crop")
    #print(cropid)
    if(farmerCursor.rowcount!=0):
        #print("in farmer alert "+pest)
        for i in result:
            farmer_name=i[2]
            mobile_no=str(i[1])
            mobile_no=mobile_no[3:]
            language=i[3]
            fid=i[0]
            district=i[4]
            if not fid in record_dict.keys():
                record_dict[fid] = []
                record_dict[fid].append("\n Dear Farmer " + farmer_name + ",\n"+ "Temperature :" + str(avg_temperature)[:5] + "\nHumidity :" + str(avg_humidity)+"\n" + "Because of the immediate change in weather, the following pests may occur to your crop \n" + cropid + ":\n" + "pest :" + pest + "\n")
                record_dict[fid].append("Mobile :" + mobile_no + "\n")
                record_dict[fid].append("language :" + language)
                record_dict[fid].append("district :" + district)
            else:
                record_dict[fid].append(pest + "\n")
                #record_dict[fid].append(pest + "\n" + "Treatment :" + "\n" + treatment + "\n")
            #print(record_dict)

        return record_dict

#Alert function
#alertfun(pest_r,i[0],avg_temperature,avg_humidity)
def alertfun(r,district,avg_temperature,avg_humidity):
    for j in r[1:]:
        pest = j[1]
        cropid=j[0]
        pestminTemp = float(j[2])
        pestmaxTemp = float(j[3])
        treatment=j[6]
        if (avg_temperature >= pestminTemp and avg_temperature <= pestmaxTemp and j[4]!='NA' and avg_humidity>=float(j[4]) and avg_humidity<=float(j[5])):
            farmerAlert(cropid, pest,treatment,duartion,district)
        elif (avg_temperature >= pestminTemp and avg_temperature <= pestmaxTemp and j[4]=='NA' ):
            farmerAlert(cropid, pest,treatment,duartion,district)
    for record in record_dict:
        w=""
        d=""
        for to_be_write in record_dict[record]:
            if (not to_be_write.startswith("Mobile") and not to_be_write.startswith("language") and not to_be_write.startswith("district")):
                w+=to_be_write
                #print(to_be_write)
            if(to_be_write.startswith("district")):
                d=to_be_write
                
        w+="For more information please contact to Kisan Call Centre"+"\n18001801551"
        l={"language :marathi":'mr',"language :hindi":'hi',"language :kannada":'kn',"Language :TELUGU":'te',"language :english":'en',"Language :BENGALI":'bn',"Language :GUJARATI":'gu',"Language :MALAYALAM":'ml',"Language :PUNJABI":'pa'}
        transfile = translator.translate(w, l[record_dict[record][2]]).text
        #print(record_dict[record][1].split(":")[1])
        if(d[10:]==district):
            resp = sendSMS('apikey',record_dict[record][1].split(":")[1],'Jims Autos', transfile[:320])
            print(resp)
        #if(len(transfile)>=320):
        #resp1 = sendSMS('apikey', record_dict[record][1].split(":")[1], 'Jims Autos', transfile[320:])
        #print(resp1)
        
    print("***")
    print(record_dict)
    #print(len(transfile))
def fetchWeather(city):
    api_key = '600ba254f444972510ee7caf9731e509'
    api_call = 'https://api.openweathermap.org/data/2.5/forecast?appid=' + api_key
    api_call += '&q=' + city
    json_data = requests.get(api_call).json()
    if(json_data['cod']!='404'):
        temp = []
        hum = []
        for item in json_data['list']:
            temperature = round(item['main']['temp'] - 273.15, 2)
            humidity = item['main']['humidity']
            description = item['weather'][0]['description']
            temp.append(temperature)
            hum.append(humidity)
        print(city)
        #print(temp)
        #print(hum)
        avg_temperature = sum(temp) / len(temp)
        avg_humidity = sum(hum) / len(hum)
        print(avg_temperature)
        print(avg_humidity)
        return [avg_temperature,avg_humidity]
    else:
        return 404
        
pest_r=[]
with open("data/TPest.csv", 'r') as cf:
    csvreader =list(csv.reader(cf))
    for row in csvreader:
        pest_r.append(row)
#*****************#
conn= pymysql.connect(host="localhost",user="root",passwd="",db="baliraja")
farmerCursor=conn.cursor()
def cron():
  print("hii")
  districtquery = "select distinct district,state from farmer_details;"
  farmerCursor.execute(districtquery)
  resdistrict = farmerCursor.fetchall()
  print(resdistrict)
  di=""
  #api_call = 'https://api.openweathermap.org/data/2.5/forecast?appid=' + api_key
  for i in resdistrict:
      global avg_temperature
      global avg_humidity
      t1=fetchWeather(i[0])
      if(t1==404):
                districtquery = "select state_name from state where state_id='"+str(i[1])+"';"
                farmerCursor.execute(districtquery)
                resState = farmerCursor.fetchone()
                print(resState)
                y=resState[0]
                if(resState[0]=='Andaman and Nicobar Island (UT)'):
                    y=resState[0]
                    y='Andaman'
                t2=fetchWeather(y)
                avg_temperature=t2[0]
                avg_humidity=t2[1]
                alertfun(pest_r,i[0],avg_temperature,avg_humidity)
      elif(len(t1)==2):
                avg_temperature=t1[0]
                avg_humidity =t1[1]
                alertfun(pest_r,i[0],avg_temperature,avg_humidity)
      else:
                continue
cron()
'''
schedule.every().monday.do(cron)
while True:
  schedule.run_pending()
  time.sleep(1)
'''     
'''
url="http://dataservice.accuweather.com/currentconditions/v1/204849?apikey=ZiDM5AvIsUnsbscmRLRxDxNWGlguRADD&details=true"
response=requests.get(url)
x=response.json()
current_temperature=x[0]["Temperature"]["Metric"]["Value"]
current_humidity=x[0]["RelativeHumidity"]
print(current_humidity)
print(current_temperature)
'''







