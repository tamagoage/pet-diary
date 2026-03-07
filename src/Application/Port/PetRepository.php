<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Application\Port;

use Tamagoage\PetDiary\Domain\Entity\Pet;

interface PetRepository
{
    /**
     * @param positive-int $pet_id
     */
    public function getById(int $pet_id): ?Pet;

    /**
     * @param list<positive-int> $pet_ids
     * @return list<Pet>|array{}
     */
    public function getByIds(array $pet_ids): array;

    /**
     * @return list<Pet>|array{}
     */
    public function getAll(): array;

    public function save(string $pet_name): bool;
}
