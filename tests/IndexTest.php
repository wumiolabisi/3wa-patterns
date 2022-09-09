<?php

use Framework\Moteur;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

class IndexTest extends TestCase
{
    protected Moteur $framework;

    public function setUp(): void
    {
        $routes = require __DIR__ . '/../src/routes.php';
        $urlMatcher = new UrlMatcher($routes, new RequestContext());
        $dispatcher = new EventDispatcher;
        $this->framework = new Moteur($dispatcher, $urlMatcher);
    }

    public function testHome()
    {


        $request = Request::create('/home/Wumi');
        $response = $framework->run($request);

        $this->assertEquals('Hello Wumi', $response->getContent());
    }
}
