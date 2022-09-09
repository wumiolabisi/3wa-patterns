<?php

use Framework\Moteur;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class IndexTest extends TestCase
{

    public function testHome()
    {

        $framework = new Moteur;

        $request = Request::create('/home/Wumi');
        $response = $framework->run($request);

        $this->assertEquals('Hello', $response->getContent());
    }
}
