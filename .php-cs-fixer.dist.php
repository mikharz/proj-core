<?php declare(strict_types=1);

return new PhpCsFixer\Config()
    ->setFinder(
        new PhpCsFixer\Finder()
            ->in(__DIR__)
    )
    ->setParallelConfig(
        PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect()
    )
    ->setRiskyAllowed(true)
    ->setRules(
        [
            '@PSR12:risky' => true,
            '@PHP82Migration:risky' => true,
            '@PHP84Migration' => true,
        ],
    );