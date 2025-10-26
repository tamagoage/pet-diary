<?php

namespace Tamagoage\PetDiary\Domain\Model;

use InvalidArgumentException;

class PartialDate
{
    private const MIN_YEAR = 1950; 

    /**
     * @param positive-int $year
     * @param positive-int|null $month
     * @param positive-int|null $day
     */
    public function __construct(
        private int $year,
        private int|null $month,
        private int|null $day
    ){
        $this->validateYear();
        $this->validateMonth();
        $this->validateFullDate();
    }

    private function validateYear(): void
    {
        $current_year = (int)date('Y');
        if ($this->year < self::MIN_YEAR || $this->year > $current_year) {
            throw new InvalidArgumentException("西暦の値が異常です", $this->year);
        }
    }

    private function validateMonth(): void
    {
        if ($this->month !== null && ($this->month < 1 || $this->month > 12)) {
            throw new InvalidArgumentException("月の値が異常です", $this->month);
        }
    }

    private function validateFullDate(): void
    {
        if ($this->month !== null && $this->day !== null) {
            if (!checkdate($this->year, $this->month, $this->day)) {
                throw new InvalidArgumentException("{$this->year}年{$this->month}月{$this->day}日は存在しない日付です");
            }
        }
    }
}
