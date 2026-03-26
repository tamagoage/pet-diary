<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Application\Pet\CreatePet;

use Tamagoage\PetDiary\Domain\ValueObject\PartialDate;
use Tamagoage\PetDiary\Domain\ValueObject\PetName;

final class CreatePetCommand
{
    public function __construct(
        public readonly PetName $petName,
        public readonly PartialDate $birthday,
        public readonly ?bool $sex,
        public readonly ?string $breed,
    ) {
    }
}
