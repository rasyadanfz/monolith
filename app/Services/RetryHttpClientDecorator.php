<?php

namespace App\Services;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class RetryHttpClientDecorator
{
    private $httpClient;
    private $maxRetries;

    public function __construct($httpClient, $maxRetries = 5)
    {
        $this->httpClient = $httpClient;
        $this->maxRetries = $maxRetries;
    }

    public function request($method, $uri, array $options = [])
    {
        $retries = 0;

        do {
            try {
                return $this->httpClient->request($method, $uri, $options);
            } catch (RequestException $e) {
                if ($retries >= $this->maxRetries) {
                    throw $e;
                }
                $retries++;
            }
        } while ($retries < $this->maxRetries);

        throw $e;
    }

    public function putRequestWithToken($uri, $token, array $data){
        $retries = 0;
        $options = ['headers' => ['Authorization' => "Bearer $token"], 'json' => $data];
        do {
            try {
                return $this->httpClient->put($uri, $options);
            } catch (RequestException $e) {
                if ($retries >= $this->maxRetries) {
                    throw $e;
                }
                $retries++;
            }
        } while ($retries < $this->maxRetries);

        throw $e;
    }

    
}