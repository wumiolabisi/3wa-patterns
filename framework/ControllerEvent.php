<?php


namespace Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\EventDispatcher\Event;

class ControllerEvent extends Event
{
    protected Request $request;
    protected $callable;

    public function __construct(Request $request, $callable)
    {
        $this->request = $request;
        $this->callable = $callable;
    }

    public function getController()
    {
        return $this->callable;
    }
    public function getRequest(): Request
    {
        return $this->request;
    }
}
