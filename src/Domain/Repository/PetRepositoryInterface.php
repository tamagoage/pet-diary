<?php

namespace Tamagoage\PetDiary\Domain\Repository;

use Tamagoage\PetDiary\Domain\Model\Pet;

interface PetRepositoryInterface
{
    /**
     * @param positive-int $pet_id
     */
    public function getById(int $pet_id): ?Pet;

    /**
     * @param list<positive-int> $ped_ids
     * @return list<Pet>|array{}
     */
    public function getByIds(array $pet_ids): array;

    /**
     * @return list<Pet>|array{}
     */
    public function getAll(): array;

    public function save(string $pet_name): bool;
}