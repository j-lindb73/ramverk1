<?php

namespace Lefty\IpValidation;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpGetLocalIPTest extends TestCase
{

    private $ipLocal;
    
    
    /**
     * Prepare before each test.
     */
    protected function setUp()
    {

        $this->ipLocal = new IpGetLocalIP();
    }
    

    /**
     * Test.
     */
    public function testLocalIPFail()
    {
        // var_dump($ipVal->getIp());
        
        $res = $this->ipLocal->getLocalIP();
        $isValid = $this->ipLocal->checkValid();
        
        
        $this->assertNull($res);
        $this->assertFalse($isValid);
    }
    
    
    /**
     * Test.
     */
    public function testLocalIPSuccess()
    {
        // var_dump($ipVal->getIp());
        
        $this->ipLocal->setLocalIP("10.20.30.40");
        $this->ipLocal->setValidTrue();
        $res = $this->ipLocal->getLocalIP();

        
        $this->assertContains($res, "10.20.30.40");
    }
}
