<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Application\Pet\CreatePet;

use Tamagoage\PetDiary\Domain\ValueObject\PartialDate;
use Tamagoage\PetDiary\Domain\ValueObject\PetName;

class CreatePetCommandFactory
{
    public function create(
        string $pet_name,
        int $birth_year,
        int|null $birth_month,
        int|null $birth_day,
        bool|null $sex,
        string|null $breed,
    ): CreatePetCommand {
        return new CreatePetCommand(
            PetName::fromString(trim($pet_name)),
            PartialDate::fromInts(
                $birth_year,
                $birth_month,
                $birth_day
            ),
            $sex,
            $breed
        );
    }
}
