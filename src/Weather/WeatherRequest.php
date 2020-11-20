<?php


namespace Lefty\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
*
*
*/


class WeatherRequest implements ContainerInjectableInterface
{

    use ContainerInjectableTrait;

    private $curl = "";
    private $apiKey = "";
    
    public function setAPI(string $key)
    {
        $this->apiKey = $this->di->get("keystore")->getKey($key);
    }

    public function checkWeather(string $latitude, string $longitude)
    {
        // $this->apiKey = $this->di->get("keystore")->getKey("openweatermap");
        $this->geoInitCurl();
        $this->geoSetOptCurl($latitude, $longitude);
        $this->geoExecuteCurl();
        $this->geoCloseCurl();
    }

    private function geoInitCurl()
    {
        $this->curl = curl_init();
    }
 
    private function geoSetOptCurl($latitude, $longitude)
    {
        // curl_setopt($this->curl, CURLOPT_URL, "http://api.ipstack.com/" . $ipAddress . "?access_key=" . $this->apiKey ."&fields=latitude,longitude,city");
        curl_setopt($this->curl, CURLOPT_URL, "https://api.openweathermap.org/data/2.5/onecall?lat=" . $latitude . "&lon=". $longitude . "&units=metric&exclude=hourly,minutely&appid=" . $this->apiKey);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
    }
    
    private function geoExecuteCurl()
    {
        $this->geoLocation = json_decode(curl_exec($this->curl));
    }
    
    private function geoCloseCurl()
    {
        curl_close($this->curl);
    }
    
    public function getWeather()
    {
        return $this->geoLocation;
    }
}
