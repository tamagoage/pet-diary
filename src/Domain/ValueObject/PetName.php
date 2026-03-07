<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Domain\ValueObject;

use InvalidArgumentException;

class PetName
{
    /**
     * @param non-falsy-string $value
     */
    private function __construct(
        private string $value
    ) {
    }

    public static function fromString(string $raw): self
    {
        $value = mb_trim($raw);
        if ($value === '') {
            throw new InvalidArgumentException('ペット名は必須');
        }
        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }
}
