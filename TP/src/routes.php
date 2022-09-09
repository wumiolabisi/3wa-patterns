<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;


class DefaultPageController
{
}





$routes = new RouteCollection;

$routes->add('home', new Route('/home/{name}', [
    'name' => 'World',
    'callable' => function (Request $request) {
        $name = $request->attributes->get('name');
        ob_start();
        include __DIR__ . '/pages/home.php';
        return new Response(ob_get_clean());
    }
]));

$routes->add('about', new Route('/a-propos'));


return $routes;
