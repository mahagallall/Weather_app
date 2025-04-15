<?php

class City {
    private $cities;

    public function __construct($filePath) {
        $json = file_get_contents($filePath);
        $this->cities = json_decode($json, true);
    }

    public function getEgyptianCities() {
        $egyptianCities = [];
        foreach ($this->cities as $city) {
            if ($city['country'] === 'EG') {
                $egyptianCities[] = $city;
            }
        }
        return $egyptianCities;
    }
}
