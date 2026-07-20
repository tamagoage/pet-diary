<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Tamagoage\PetDiary\Infra\Core\Exception\BadRequestException;
use Tamagoage\PetDiary\Infra\Core\Request;

class RequestTest extends TestCase
{
    //@phpstan-ignore-nextline
    private array $server;

    protected function setUp(): void
    {
        $this->server = $_SERVER;
    }

    protected function tearDown(): void
    {
        $_SERVER = $this->server;
    }

    public function test_正常にパスを取得できる(): void
    {
        $_SERVER['REQUEST_URI'] = '/test?q=1';

        $this->assertSame('/test', (new Request())->getPath());
    }

    public function test_urlを取得できないときは例外を返す(): void
    {
        unset($_SERVER['REQUEST_URI']);

        $this->expectException(BadRequestException::class);

        (new Request())->getPath();
    }
}
