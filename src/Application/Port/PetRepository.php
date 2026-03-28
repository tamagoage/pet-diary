<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Application\Port;

use Tamagoage\PetDiary\Domain\Entity\Pet;

interface PetRepository
{
    public function save(Pet $pet): int;
}
