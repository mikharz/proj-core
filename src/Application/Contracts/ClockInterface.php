<?php declare(strict_types=1);

namespace Core\Application\Contracts;

interface ClockInterface
{
    public function bootstrap(): void;

    public function now(): \DateTimeImmutable;
}
