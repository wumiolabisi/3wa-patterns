<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Router\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

$response = new Response();
$map = [
    '/hello' => 'hello.php',
    '/bye' => 'bye.php'
];
$pathInfo = $request->GetPathInfo();

$router = new Router();
$router->register('/', function () {
    return 'hello';
});

$router->register('/bye', function () {
    return 'bye';
});

try {
    echo $router->resolve($request->getRequestUri());
} catch (Exception $e) {
    $response->setContent("La page demandée n'existe pas");
    $response->setStatusCode(404);
    $response->send();
}
/*
if (isset($map[$pathInfo])) {

    /* Get all variables and corresponding values 
     * [ name =>'Anna'] will become $name = 'Anna'    
     
    extract($request->query->all());

     Memoire tampon 
    ob_start();
    /* include __DIR__ . '/../src/pages/' . $map[$pathInfo];
    $response->setContent(ob_get_clean());
} else {

    $response->setContent("La page demandée n'existe pas");
    $response->setStatusCode(404);
}
$response->send();
*/