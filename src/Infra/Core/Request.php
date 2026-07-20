<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Infra\Core;

use Tamagoage\PetDiary\Infra\Core\Exception\BadRequestException;

/**
 * @return string
 */
class Request
{
    public function getPath(): string
    {
        $url = $_SERVER['REQUEST_URI'] ?? null;

        if ($url === null) {
            throw new BadRequestException();
        }

        $path = parse_url($url, PHP_URL_PATH);

        return $path;
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
