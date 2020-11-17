<?php

namespace Lefty\IpValidation;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpValidationSuccessTest extends TestCase
{

    private $ipVal;
    
    
    /**
     * Prepare before each test.
     */
    protected function setUp()
    {

        $this->ipVal = new IpValidation("8.8.8.8");
    }
    
    
    
    /**
     * Test.
     */
    public function testGetIP()
    {
        // var_dump($ipVal->getIp());
        
        $res = $this->ipVal->getIp();

        // var_dump($body);
        // $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        $this->assertContains("8.8.8.8", $res);
    }

    /**
     * Test.
     */
    public function testValidIP()
    {
        // var_dump($ipVal->getIp());
        
        $valid = $this->ipVal->isValid();
        $validIPv4 = $this->ipVal->isValidIPv4();
        $validIPv6 = $this->ipVal->isValidIPv6();

        // var_dump($body);
        // $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        $this->assertTrue($valid);
        $this->assertTrue($validIPv4);
        $this->assertFalse($validIPv6);
    }

    /**
     * Test.
     */
    public function testGetHostname()
    {
        // var_dump($ipVal->getIp());
        
        $hostname = $this->ipVal->getHostname();

        $this->assertContains("dns.google", $hostname);
    }

    /**
     * Test.
     */
    public function testValidMessage()
    {
        // var_dump($ipVal->getIp());
        
        $message = $this->ipVal->answer();

        $this->assertInternalType("array", $message);
    }
}
