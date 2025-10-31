<?php declare(strict_types=1);

namespace Core\Infrastructure\Clock;

use Core\Application\Contracts\ClockInterface;
use Core\Application\Contracts\EnvironmentInterface;

class Clock implements ClockInterface
{
    public static function boot(EnvironmentInterface $env): void
    {
        $timezone = $env->get('TIMEZONE');
        if (null !== $timezone) {
            date_default_timezone_set($timezone);
        }
    }

    public function now(): \DateTimeImmutable
    {
        return new \DateTimeImmutable('now');
    }
}
