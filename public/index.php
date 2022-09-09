<?php

use Framework\RequestEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Contracts\EventDispatcher\Event;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();
$dispatcher = new EventDispatcher;

$dispatcher->addListener('app.request', function (RequestEvent $event) {
    $event->getRequest()->attributes->set('name', 'Anna');
});
$framework = new Framework\Moteur($dispatcher);

$response = $framework->run($request);

$response->send();
