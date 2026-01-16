<?php

declare(strict_types=1);

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
    private function __construct(
        private int $year,
        private int|null $month,
        private int|null $day
    ) {
    }

    public static function fromInts(
        int $year,
        int|null $month,
        int|null $day
    ): self {
        self::validateYear($year);
        self::validateMonth($month);
        self::validateMonthDayDependency($month, $day);
        self::validateFullDate($year, $month, $day);
        
        return new self(
            $year,
            $month,
            $day
        );
    }

    private static function validateYear(int $year): void
    {
        $current_year = (int)date('Y');
        if ($year < self::MIN_YEAR || $year > $current_year) {
            throw new InvalidArgumentException("西暦の値が異常です");
        }
    }

    private static function validateMonthDayDependency(int|null $month, int|null $day): void
    {
        if ($day !== null && $month === null) {
            throw new InvalidArgumentException("月が欠落しています");
        }
    }

    private static function validateMonth(int|null $month): void
    {
        if ($month !== null && ($month < 1 || $month > 12)) {
            throw new InvalidArgumentException("月の値が異常です");
        }
    }

    private static function validateFullDate(int $year, int|null $month, int|null $day): void
    {
        if ($month !== null && $day !== null) {
            if (!checkdate($month, $day, $year)) {
                throw new InvalidArgumentException("{$year}年{$month}月{$day}日は存在しない日付です");
            }
        }
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getMonth(): int|null
    {
        return $this->month;
    }

    public function getDay(): int|null
    {
        return $this->day;
    }
}
