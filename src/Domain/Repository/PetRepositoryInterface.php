<?php

namespace Tamagoage\PetDiary\Domain\Repository;

use Tamagoage\PetDiary\Domain\Model\Pet;

interface PetRepositoryInterface
{
    /**
     * @param positive-int $pet_id
     */
    public function getById(int $pet_id): ?Pet;
}