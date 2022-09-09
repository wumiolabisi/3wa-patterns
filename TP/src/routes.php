<?php


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;


$routes = new RouteCollection;

$routes->add('home', new Route('/home/{name}', [
    'name' => 'World',
    'callable' => [new \App\Controller\HomeController, 'home']

]));

$routes->add('about', new Route('/a-propos', [
    'callable' => [new \App\Controller\AboutController, 'about']
]));


return $routes;
