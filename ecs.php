<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use Symplify\CodingStandard\Fixer\ArrayNotation\ArrayListItemNewlineFixer;
use Symplify\CodingStandard\Fixer\ArrayNotation\ArrayOpenerAndCloserNewlineFixer;
use Symplify\CodingStandard\Fixer\ArrayNotation\StandaloneLineInMultilineArrayFixer;
use Symplify\CodingStandard\Fixer\Spacing\StandaloneLinePromotedPropertyFixer;
use Symplify\CodingStandard\Fixer\Strict\BlankLineAfterStrictTypesFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([
        __DIR__ . '/public',
        __DIR__ . '/src',
        __DIR__ . '/tests',
        __DIR__ . '/ecs.php',
    ]);

    $ecsConfig->sets([
        SetList::PSR_12,
    ]);

    $ecsConfig->rules([
        ArrayListItemNewlineFixer::class,
        ArrayOpenerAndCloserNewlineFixer::class,
        BlankLineAfterStrictTypesFixer::class,
        StandaloneLineInMultilineArrayFixer::class,
        StandaloneLinePromotedPropertyFixer::class,
        DeclareStrictTypesFixer::class,
        TrailingCommaInMultilineFixer::class,
        NoUnusedImportsFixer::class,
    ]);
};
