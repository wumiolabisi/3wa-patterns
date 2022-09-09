<?php

namespace Framework;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symofny\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\EventDispatcher\Event;

class Moteur
{
    protected EventDispatcherInterface $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }
    public function run(Request $request)
    {


        $routes = require __DIR__ . '/../src/routes.php';

        /* Infos nécessaires au UrlMatcher pour la requête actuelle (est-ce que c'est du GET ? variables ou non ? etc) */
        $context = new RequestContext();
        $context->fromRequest($request);

        /* Avec le contexte de la requête HTTP et les routes, analyser les infos */
        $urlMatcher = new UrlMatcher($routes, $context);

        $pathInfo = $request->getPathInfo();

        try {

            /* Get all variables and corresponding values from the given array
            * [ '_route' =>'home'] will become $name = 'Anna'    
             */
            $resultat = $urlMatcher->match($pathInfo);
            $request->attributes->add($resultat);

            $this->dispatcher->dispatch(new RequestEvent($request), 'app.request');


            /* Get the name of controller and the name of wanted method  */
            $className = substr($resultat['callable'], 0, strpos($resultat['callable'], '@'));
            $methodName = substr($resultat['callable'], strpos($resultat['callable'], '@') + 1);

            $this->dispatcher->dispatch(new ControllerEvent($request, $className), 'app.callable');

            $call = [new $className, $methodName];
            $response = call_user_func($call, $request);
            $this->dispatcher->dispatch(new ResponseEvent($response), 'app.response');
        } catch (ResourceNotFoundException $e) {

            $response = new Response("La page demandée n'existe pas");
            $response->setStatusCode(404);
        } catch (Exception $e) {

            $response = new Response("Une erreur est survenue sur le serveur");
            $response->setStatusCode(500);
        }
        return $response;
    }
}
