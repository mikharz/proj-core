<?php declare(strict_types=1);

namespace Core\Application\Contracts;

interface EnvironmentInterface
{
    public function isDevelopment(): bool;

    public function isProduction(): bool;

    public function isTest(): bool;

    public function get(string $variable): ?string;
}
