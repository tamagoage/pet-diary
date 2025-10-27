<?php

namespace Tamagoage\PetDiary\Domain\Model;

class Pet
{
    /**
     * @param positive-int $pet_id
     */
    public function __construct(
        private int $pet_id,
        private string $pet_name,
        private PartialDate $birthday,
        private bool|null $sex,
        private string|null $breed
    ){}

    /**
     * @return positive-int
     */
    public function getPetId(): int
    {
        return $this->pet_id;
    }

    public function getPetName(): string
    {
        return $this->pet_name;
    }

    public function getPetBirthday(): PartialDate
    {
        return $this->birthday;
    }

    public function getPetSex(): bool|null
    {
        return $this->sex;
    }

    public function getPetBreed(): string|null
    {
        return $this->breed;
    }
}
