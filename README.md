# BaliRaja
Crop Recommendation and Risk Alerting System using Machine Learning
INSTRUCTIONS FOR DEPLOYMENT
Follow the given steps to deploy and run this project:
Step 1: Download and install Python 3.5 or higher version and XAMPP server.
Step 2: Download the project repository.
Step 3: Create a virtual environment and activate virtualenv.
Step 4: Open directory where requirement.txt file is located and run “pip install -r requirements.txt”. It will install all the required packages for the project.
Step 5: Enable the curl library if it is not enabled by using the following steps:
        Open php.ini file, it is usually located in the server’s root folder 
        Search the ;extension=php_curl.dll and remove the semicolon ‘;’ before it to enable.
        Save and close the file. Restart server.
Step 6: Copy Baliraja folder to xampp/htdocs folder and import baliraja.sql file to the MySQL database.
Step 7: Run app.py to start flask server.
Step 8: Start XAMPP server and Go to the browser and type localhost://Baliraja

Note:
Create a FAST2SMS account and get an API key. Now change the same in the alert model(Alert.py).
Create an OpenWeather account and get an API key. Now change the same in the alert model(Alert.py).
