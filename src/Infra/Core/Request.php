<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Infra\Core;

/**
 * @return string
 */
class Request
{
    public function getPath(): string
    {
        $url = $_SERVER['REQUEST_URI'] ?? null;

        if ($url === null) {
            header("HTTP/1.1 404 Not Found");
            echo "404 - ないよー";
            exit();
        }

        $path = parse_url($url, PHP_URL_PATH);

        return $path;
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
