<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Tamagoage\PetDiary\Infra\Core\Exception\RouteNotFoundException;
use Tamagoage\PetDiary\Infra\Core\Request;
use Tamagoage\PetDiary\Infra\Core\Route;
use Tamagoage\PetDiary\Infra\Core\Router;

class RouterTest extends TestCase
{
    public function test_ルーティング定義と一致する(): void
    {
        $request = $this->createStub(Request::class);

        $request->method('getMethod')->willReturn('GET');
        $request->method('getPath')->willReturn('/test');

        $route = Route::get(
            '/test',
            static fn (): string => 'ok',
        );

        $router = new Router(
            $request,
            [$route],
        );

        $this->assertSame(
            $route,
            $router->resolve()
        );
    }

    public function test_ルーティング定義と一致しない(): void
    {
        $request = $this->createStub(Request::class);

        $request->method('getMethod')->willReturn('GET');
        $request->method('getPath')->willReturn('/testdfafsdfasdfasdfasdf');

        $route = Route::get(
            '/test',
            static fn (): string => 'ok',
        );

        $router = new Router(
            $request,
            [$route],
        );

        $this->expectException(RouteNotFoundException::class);

        $router->resolve();
    }
}
