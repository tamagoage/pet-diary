<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Application\Pet\CreatePet;

use Tamagoage\PetDiary\Application\Port\PetRepository;
use Tamagoage\PetDiary\Domain\Entity\Pet;

class CreatePetUseCase
{
    public function __construct(
        private readonly PetRepository $pet_repository,
    ) {
    }

    public function execute(CreatePetCommand $command): int
    {
        $pet = Pet::create(
            $command->petName,
            $command->birthday,
            $command->sex,
            $command->breed
        );

        return $this->pet_repository->save($pet);
    }
}
