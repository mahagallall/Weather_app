<?php

use GuzzleHttp\Client;

class Weather {
    private $apiKey;
    private $baseUrl = "http://api.openweathermap.org/data/2.5/weather";

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getWeatherWithCurl($cityId) {
        $url = "$this->baseUrl?id=$cityId&appid=$this->apiKey&units=metric";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    public function getWeatherWithGuzzle($cityId) {
        $client = new Client();
        $response = $client->get($this->baseUrl, [
            'query' => [
                'id' => $cityId,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]
        ]);
        return json_decode($response->getBody(), true);
    }
}
