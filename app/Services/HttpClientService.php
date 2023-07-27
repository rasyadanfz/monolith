<?php

// Singleton for HTTP Client

namespace App\Services;

use GuzzleHttp\Client;

class HttpClientService {
    private static $instance;
    private $httpClient;

    private function __construct()
    {
        $this->httpClient = new Client(['base_uri' => env('SINGLE_SERVICE_URL')]);
    }

    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getHttpClient(){
        return $this->httpClient;
    }
}