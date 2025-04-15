<?php
require 'classes/Weather.php';

$cityId = $_POST['city_id'];
$weather = new Weather('ac8ff292ebe1b648dd63f00102b75ac4'); 

$data = $weather->getWeatherWithCurl($cityId);

echo "City: {$data['name']}<br>";
echo "Temp Min: {$data['main']['temp_min']} °C<br>";
echo "Temp Max: {$data['main']['temp_max']} °C<br>";
echo "Humidity: {$data['main']['humidity']}%<br>";
