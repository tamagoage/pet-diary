<?php

namespace Tamagoage\PetDiary\Core;

Class Request
{
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? null;
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}