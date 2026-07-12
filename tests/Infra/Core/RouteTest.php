<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Tamagoage\PetDiary\Infra\Core\Route;

class RouteTest extends TestCase
{
    public function test_getリクエストがルーティングに一致する(): void
    {
        $handler = static fn (): string => 'ok';

        $route = Route::get('/test', $handler);

        self::assertTrue($route->matches(Route::GET, '/test'));
        self::assertFalse($route->matches(Route::POST, '/test'));
    }

    public function test_パスが空文字の際は例外を投げる(): void
    {
        $handler = static fn (): string => 'ok';

        self::expectException(InvalidArgumentException::class);

        //@phpstan-ignore-next-line
        $route = Route::get('', $handler);
    }
}
