<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Infra\Core;

class Router
{
    /**
     * @param list<Route> $routes
     */
    public function __construct(
        private readonly Request $request,
        private readonly array $routes,
    ) {
    }

    public function resolve(): Route
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        
        foreach ($this->routes as $route) {
            if ($route->matches($method, $path)) {
                return $route;
            }
        }

        header("HTTP/1.1 404 Not Found");
        echo "404 - ないよー";
        exit();
    }
}
