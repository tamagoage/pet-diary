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
}
