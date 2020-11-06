<?php

namespace Anax\IpValidation;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpValidationControllerTest extends TestCase
{

    // Create the di container.
    protected $di;
    protected $controller;



    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new IpValidationController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }



    /**
     * Test the route "index".
     */
    public function testIndexActionGet()
    {

        $res = $this->controller->indexActionGet();

        $body = $res->getBody();

        // var_dump($body);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        $this->assertContains("Validera IP", $body);
    }

    /**
     * Test the route "index".
     */
    public function testIndexActionPost()
    {
        $request = $this->di->get("request");
        $request->setPost("ip", "8.8.8.8");
        // var_dump($request);

        $res = $this->controller->indexActionPost();

        $body = $res->getBody();

        // var_dump($body);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
        $this->assertContains("Validera IP", $body);
    }

    /**
     * Test the method "catchAll".
     */
    // public function testCatchAll()
    // {
    //     $res = $this->controller->catchAll();
    //     $this->assertNull($res);
    // }




    /**
     * Test the route "dump-di".
     */
    public function testDumpDiActionGet()
    {
        // Setup di
        // $di = new DIFactoryConfig();
        // $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // // Use a different cache dir for unit test
        // $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // // Setup the controller
        // $controller = new IpValidationController();
        // $controller->setDI($di);
        // $controller->initialize();

        // Do the test and assert it
        $res = $this->controller->dumpDiActionGet();
        $this->assertContains("di contains", $res);
        $this->assertContains("configuration", $res);
        $this->assertContains("request", $res);
        $this->assertContains("response", $res);
    }
}
