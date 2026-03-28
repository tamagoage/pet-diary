<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Domain\Entity;

use Tamagoage\PetDiary\Domain\ValueObject\PartialDate;
use Tamagoage\PetDiary\Domain\ValueObject\PetName;

class Pet
{
    // pet_idは連番なのでcreate時には受け取れない
    private function __construct(
        private int|null $pet_id,
        private PetName $pet_name,
        private PartialDate $birthday,
        private bool|null $sex,
        private string|null $breed
    ) {
    }

    public static function create(
        PetName $pet_name,
        PartialDate $birthday,
        bool|null $sex,
        string|null $breed
    ): self {
        return new self(
            null,
            $pet_name,
            $birthday,
            $sex,
            $breed
        );
    }

    public function getPetId(): int|null
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

    public function getBreed(): string|null
    {
        return $this->breed;
    }
}
