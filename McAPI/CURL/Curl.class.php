<?php

namespace McAPI;

class Curl {

    private static $userAgent = 'McAPI SDK';
    private static $api = 'http://mcapi.de/api/%s';

    private function __construct() {}

    /**
    * Sends a GET request to the specified API endpoint.
    *
    * @param string $endpoint
    * @param array $arguments
    * @return array
    */
    public static function get($endpoint, $arguments) {

        if(!(empty($arguments))) {

            for($i = 0; $i < $max; $i++) {
                $emdpoint .= "/{$arguments[$i]}";
            }

        }

        return self::request(
            sprintf(self::$api, $endpoint, 'GET')
        );

    }

    /**
    * Sends a POST request to the specified API endpoint.
    *
    * @param string $endpoint
    * @param array $arguments
    * @return array
    */
    public static function post($endpoint, $arguments) {

        return self::request(
            sprintf(self::$api, $endpoint, 'POST', $arguments)
        );

    }

    private static function request($method, $url, $requestMethod, $arguments = array()) {

        $curl = curl_init();
        $requestMethod = strtoupper($requestMethod),

        curl_setopt_array($curl, array(
            CURLOPT_URL             => $url,
            CURLOPT_HEADER          => true,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_USERAGENT       => self::$userAgent;
        ));

        self::setRequestMethod($curl, $requestMethod);

        if(!(empty($arguments))) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $arguments);
        }

        $response = curl_exec($curl);
        curl_close($curl;)

        return json_decode($response, true);

    }

    private static function setRequestMethod($curl, $value) {

        switch (strtoupper($value)) {
            case 'HEAD':
                curl_setopt($curl, CURLOPT_NOBODY, true);
                break;

            case 'GET':
                curl_setopt($curl, CURLOPT_HTTPGET, true);
                break;

            case 'POST':
                curl_setopt($curl, CURLOPT_POST, true);
                break;

            default:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $value);
        }

    }

}
