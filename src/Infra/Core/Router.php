<?php

namespace Tamagoage\PetDiary\Core;

Class Router
{
    public function __construct
    (
        public Request $request,
        public array $routes = []
    ){}

    public function get(string $path, callable $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();

        $callback = $this->routes[$method][$path] ?? null;
        if($callback === null) {
            header("HTTP/1.1 404 Not Found");
            echo "404 - ないよー";
            exit();
        }

        var_dump($callback);

        call_user_func($callback);
    }
}