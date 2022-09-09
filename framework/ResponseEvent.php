<?php


namespace Framework;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\EventDispatcher\Event;

class ResponseEvent extends Event
{
    protected Response $response;
    public function __construct(Response $response)

    {
        $this->response = $response;
    }

    public function getRequest(): Response
    {
        return $this->response;
    }
}