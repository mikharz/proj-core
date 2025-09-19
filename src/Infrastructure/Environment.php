<?php declare(strict_types=1);

namespace Core\Infrastructure;

use Core\Application\Contracts\EnvironmentInterface;

enum Environment: string implements EnvironmentInterface
{
    case Development = 'development';
    case Production = 'production';
    case Test = 'test';

    public function isDevelopment(): bool
    {
        return $this === self::Development;
    }

    public function isProduction(): bool
    {
        return $this === self::Production;
    }

    public function isTest(): bool
    {
        return $this === self::Test;
    }

    public function get(string $variable): ?string
    {
        $value = getenv($variable);
        if ($value === false) {
            return null;
        }
        return $value;
    }
}
