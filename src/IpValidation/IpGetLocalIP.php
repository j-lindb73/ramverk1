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


class IpGetLocalIP implements ContainerInjectableInterface
{

    use ContainerInjectableTrait;

    // private $ipAddress = "";
    private $localIP = "";
    private $valid = false;



    public function __construct()
    {

        try {
            $this->localIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } catch (\Throwable $th) {
            // $this->localIP = "10.20.30.40";
            //throw $th;
        }

        $this->checkLocalIP();
    }
    
    
    private function checkLocalIP()
    {
        $this->valid = filter_var($this->localIP, FILTER_VALIDATE_IP);
    }


    public function getLocalIP()
    {
        if ($this->checkValid()) {
            return $this->localIP;
        }
        return null;
    }

    public function setLocalIP($value)
    {
        $this->localIP = $value;
    }
  
    public function checkValid()
    {
        return $this->valid;
    }
  
    public function setValidTrue()
    {
        $this->valid = true;
    }
}
