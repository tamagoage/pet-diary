<?php

namespace Tamagoage\PetDiary\Core;

/**
 * @return string
 */
Class Request
{
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? null;

        if ($path === null) {
            header("HTTP/1.1 404 Not Found");
            echo "404 - ないよー";
            exit();
        }

        $hasQuestion = strpos($path, '?');
        
        if($hasQuestion) {
            $path = substr($path, 0, $hasQuestion);
        }

        return $path;
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}