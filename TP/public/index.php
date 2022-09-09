<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symofny\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;

use Symfony\Component\Routing\RequestContext;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

$routes = require __DIR__ . '/../src/routes.php';

/* Infos nécessaires au UrlMatcher pour la requête actuelle (est-ce que c'est du GET ? variables ou non ? etc) */
$context = new RequestContext();
$context->fromRequest($request);

/* Connait toutes les routes de l'application et peut donc avec le contexte et les routes analyser les infos */
$urlMatcher = new UrlMatcher($routes, $context);

$pathInfo = $request->getPathInfo();

try {

    /* Get all variables and corresponding values from the given array
     * [ '_route' =>'home'] will become $name = 'Anna'    
    */
    $resultat = $urlMatcher->match($pathInfo);


    $request->attributes->add($resultat);
    $response = call_user_func($resultat['callable'], $request);




    /* Memoire tampon
    ob_start();

    include __DIR__ . '/../src/pages/' . $_route . '.php';

    $response = new Response(ob_get_clean()); */
} catch (ResourceNotFoundException $e) {

    $response = new Response("La page demandée n'existe pas");
    $response->setStatusCode(404);
} /*catch (Exception $e) {

    $response = new Response("Une erreur est survenue sur le serveur");
    $response->setStatusCode(500);
}*/

$response->send();
