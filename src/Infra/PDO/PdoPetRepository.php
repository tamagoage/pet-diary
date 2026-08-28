<?php

declare(strict_types=1);

namespace Tamagoage\PetDiary\Infra\PDO;

use PDO;
use RuntimeException;
use Tamagoage\PetDiary\Application\Port\PetRepository;
use Tamagoage\PetDiary\Domain\Entity\Pet;

class PdoPetRepository implements PetRepository
{
    public function __construct(
        private readonly PDO $pdo,
    ) {
    }

    public function save(Pet $pet): int
    {
        $stmt = $this->pdo->prepare(
            <<<'SQL'
            INSERT INTO pets (
                `name`,
                `birth_year`,
                `birth_month`,
                `birth_day`,
                `sex`,
                `breed`
            )
            VALUES (
                :name,
                :birth_year,
                :birth_month,
                :birth_day,
                :sex,
                :breed
            )
            SQL
        );

        $birthday = $pet->getBirthday();
        $sex = $pet->getSex() === null ? null : (int) $pet->getSex();

        $stmt->execute([
            'name' => $pet->getPetName()->value(),
            'birth_year' => $birthday->getYear(),
            'birth_month' => $birthday->getMonth(),
            'birth_day' => $birthday->getDay(),
            'sex' => $sex,
            'breed' => $pet->getBreed(),
        ]);

        $id = $this->pdo->lastInsertId();
        if ($id === false) {
            throw new RuntimeException("idを取得できなかった", 1);
        }

        return (int) $id;
    }
}
