<?php


namespace Lefty\IpValidation;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
*
*
*/


class IpGeoLocation implements ContainerInjectableInterface
{

    use ContainerInjectableTrait;

    private $curl = "";
    private $geoLocation = "";
    private $apiKey = "";


    public function __construct(string $ipAddress)
    {

        $config = require ANAX_INSTALL_PATH . "/config/apikey.php";
        $this->apiKey = $config["apiKey"];
        $this->checkGeoLocation($ipAddress);
    }
    
    
    private function checkGeoLocation($ipAddress)
    {
        $this->geoInitCurl();
        $this->geoSetOptCurl($ipAddress);
        $this->geoExecuteCurl();
        $this->geoCloseCurl();
    }

    private function geoInitCurl()
    {
        $this->curl = curl_init();
    }
 
    private function geoSetOptCurl($ipAddress)
    {
        curl_setopt($this->curl, CURLOPT_URL, "http://api.ipstack.com/" . $ipAddress . "?access_key=" . $this->apiKey ."&fields=latitude,longitude,city");
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
    
    public function getGeoLocation()
    {
        return $this->geoLocation;
    }
}
