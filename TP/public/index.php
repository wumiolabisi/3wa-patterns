<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

$response = new Response();
$map = [
    '/hello' => 'hello.php',
    '/bye' => 'bye.php'
];
$pathInfo = $request->GetPathInfo();


if (isset($map[$pathInfo])) {

    /* Memoire tampon */
    ob_start();
    include __DIR__ . '/../src/pages/' . $map[$pathInfo];
    $response->setContent(ob_get_clean());
} else {

    $response->setContent("La page demandée n'existe pas");
    $response->setStatusCode(404);
}
$response->send();
