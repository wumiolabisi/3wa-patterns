<?php

use Symfony\Component\HttpFoundation\Request;


require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

$framework = new Framework\Moteur;

$response = $framework->run($request);

$response->send();
