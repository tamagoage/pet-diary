<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Infra\Core;

use Closure;
use InvalidArgumentException;

final class Route
{
    public const GET = 'GET';
    public const POST = 'POST';

    /**
     * @param 'GET'|'POST' $method
     */
    private function __construct(
        private readonly string $method,
        private readonly string $path,
        private readonly Closure $handler,
    ) {
        if ($path === '') {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @param non-empty-string $path
     */
    public static function get(string $path, Closure $handler): self
    {
        return new Route(
            self::GET,
            $path,
            $handler,
        );
    }

    /**
     * @param non-empty-string $path
     */
    public static function post(string $path, Closure $handler): self
    {
        return new Route(
            self::POST,
            $path,
            $handler,
        );
    }

    /**
     * @param non-empty-string $path
     */
    public function matches(string $method, string $path): bool
    {
        return $this->method === $method && $this->path === $path;
    }

    public function handler(): Closure
    {
        return $this->handler;
    }
}
