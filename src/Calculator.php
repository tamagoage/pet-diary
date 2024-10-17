<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary;

class Calculator
{
    public function add(int $firstPrice, int $SecondPrice): int
    {
        return $firstPrice + $SecondPrice;
    }

    public function sub(int $firstPrice, int $SecondPrice): int
    {
        return $firstPrice - $SecondPrice;
    }
}
