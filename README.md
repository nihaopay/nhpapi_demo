# NihaoPay API Demo(PHP)

A simple code for NihaoPay API, written with PHP.  [API Introduction](API http://docs.nihaopay.com/api/)

## Requirements
PHP >= 5.3.2 with cURL extension

#Change Config
Please modify your token in config.php      

If you want to switch to live environment,
please change
define("API_URL", "https://apitest.nihaopay.com/v1.2");   
to    
define("API_URL", "https://api.nihaopay.com/v1.2/");  //live environment    
