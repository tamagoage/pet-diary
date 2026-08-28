<?php

declare(strict_types=1);

namespace Tests\Application\Pet\CreatePet;

use PHPUnit\Framework\TestCase;
use Tamagoage\PetDiary\Application\Pet\CreatePet\CreatePetCommand;
use Tamagoage\PetDiary\Application\Pet\CreatePet\CreatePetUseCase;
use Tamagoage\PetDiary\Application\Port\PetRepository;
use Tamagoage\PetDiary\Domain\ValueObject\PartialDate;
use Tamagoage\PetDiary\Domain\ValueObject\PetName;

class CreatePetUseCaseTest extends TestCase
{
    public function test_executeはPetをつくる(): void
    {
        $repository_mock = $this->createMock(PetRepository::class);
        $repository_mock->expects($this->once())->method('save')->willReturn(1);

        $pet_command = new CreatePetCommand(
            PetName::fromString("rouge"),
            PartialDate::fromInts(
                2013,
                3,
                21
            ),
            false,
            "黒ラブ"
        );

        $actual = new CreatePetUseCase($repository_mock)->execute($pet_command);
        $this->assertSame(1, $actual);
    }
}
