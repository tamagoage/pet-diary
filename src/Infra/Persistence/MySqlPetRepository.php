<?php

namespace Tamagoage\PetDiary\Infra\Persistence;

use Tamagoage\PetDiary\Domain\Model\Pet;
use Tamagoage\PetDiary\Domain\Repository\PetRepositoryInterface;

class MySqlPetRepository implements PetRepositoryInterface
{
    /**
     * @param positive-int $pet_id
     */
    public function getById(int $pet_id): ?Pet
    {

    }

    /**
     * @param list<positive-int> $ped_ids
     * @return list<Pet>|array{}
     */
    public function getByIds(array $pet_ids): array
    {

    }

    /**
     * @return list<Pet>|array{}
     */
    public function getAll(): array
    {

    }

    public function save(Pet $pet): bool
    {
        
    }
}
