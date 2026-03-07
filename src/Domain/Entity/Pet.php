<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Domain\Entity;

use Tamagoage\PetDiary\Domain\ValueObject\PartialDate;
use Tamagoage\PetDiary\Domain\ValueObject\PetName;

class Pet
{
    /**
     * @param positive-int $pet_id
     */
    private function __construct(
        private int $pet_id,
        private PetName $pet_name,
        private PartialDate $birthday,
        private bool|null $sex,
        private string|null $breed
    ) {
    }

    public static function create(
        int $pet_id,
        PetName $pet_name,
        PartialDate $birthday,
        bool|null $sex,
        string|null $breed
    ): self {
        return new self(
            $pet_id,
            $pet_name,
            $birthday,
            $sex,
            $breed
        );
    }

    public function getId(): int
    {
        return $this->pet_id;
    }

    public function getPetName(): PetName
    {
        return $this->pet_name;
    }

    public function getBirthday(): PartialDate
    {
        return $this->birthday;
    }

    public function getSex(): bool|null
    {
        return $this->sex;
    }

    public function getBreed(): bool|null
    {
        return $this->breed;
    }
}
