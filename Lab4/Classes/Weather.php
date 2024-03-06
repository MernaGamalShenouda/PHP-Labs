<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weather
 *
 * @author webre
 */
class Weather implements Weather_Interface {

    //put your code here
    private $url;

    public function __construct() {
       
    }

    public function get_cities() {
      $citiesFile = __CITIES_FILE;
      $string = file_get_contents($citiesFile);
      $json_cities = json_decode($string, true);
      $cities = [];
      foreach ($json_cities as $city) {
        if (isset($city['country']) && $city['country'] === 'EG') {
            $cities[$city['id']] = $city['name'];
        }
    }
      return $cities;
    }

    public function get_weather($cityId) {
      $apiKey = OPENWEATHERMAP_API_KEY;
      $ApiUrl = __WEATHER_URL;
      $weatherUrl = str_replace(["{{cityid}}", "{{apikey}}"], [$cityId, $apiKey], $ApiUrl);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_URL, $weatherUrl);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
      $response = curl_exec($ch);
      curl_close($ch);
      $data = json_decode($response, true);
      return $data;
    }

    public function get_current_date() {
        $currentTime = time();
        $formattedDate = date("jS F,o", $currentTime);
        return $formattedDate;
    }

    public function get_current_time() {
        $currentTime = time();
        $formattedTime = date("l g:i a", $currentTime);
        return $formattedTime;
    }

}
