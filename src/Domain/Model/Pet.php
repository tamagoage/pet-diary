<?php

namespace Tamagoage\PetDiary\Domain\Model;

class Pet
{
    /**
     * @param positive-int $pet_id
     */
    public function __construct(
        private int $pet_id,
        private string $pet_name
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
}
