<?php


namespace Router;

use Exception;

class Router
{
    private array $routes;
    public function register(string $pathInfo, callable $action): void
    {
        $this->routes[$pathInfo] = $action;
    }

    public function resolve(string $url): mixed
    {
        $path = explode('?', $url[0]);
        /* Est-ce que la route est différente de null ? Si oui je stocke dans ma var */
        $action = $this->routes[$path] ?? null;


        if (!is_callable($action)) {
            throw new Exception("Erreur : route not found");
        }

        return $action();
    }
}
