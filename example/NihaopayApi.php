<?php

/**
*/
class NihaopayApi {
    public static $bearerToken;
    const API_URL = "https://apitest.nihaopay.com/v1.2";//test environment
    
    //const API_URL = "https://api.nihaopay.com/v1.1";//production environment

    public function __construct($token) {
        self::$bearerToken = "Bearer " . $token;
    }
    
    public function getToken() {
        return self::$bearerToken;
    }

}