<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Tests\Domain\Model;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Tamagoage\PetDiary\Domain\Model\PartialDate;

class PartialDateTest extends TestCase
{
    public function test正常系_PartialDateを作れる(): void
    {
        $actual = PartialDate::fromInts(2025, 11, 2);
        $this->assertInstanceOf(PartialDate::class, $actual);
    }

    public function test正常系_月日が欠けていてもPartialDateを作れる(): void
    {
        $actual = PartialDate::fromInts(2025, null, null);
        $this->assertInstanceOf(PartialDate::class, $actual);
    }

    public function test異常系_西暦が不正(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('西暦の値が異常です');
        PartialDate::fromInts(2025000000, null, null);
    }

    public function test異常系_月が欠落(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('月が欠落しています');
        PartialDate::fromInts(2025, null, 6);
    }

    public function test異常系_月が不正(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('月の値が異常です');
        PartialDate::fromInts(2025, 0, null);
    }

    public function test異常系_存在しない組み合わせ(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('2025年2月31日は存在しない日付です');
        PartialDate::fromInts(2025, 2, 31);
    }
}
