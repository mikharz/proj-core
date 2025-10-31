<?php declare(strict_types=1);

namespace Core\Application\Contracts;

interface ClockInterface extends BootableInterface
{
    public function now(): \DateTimeImmutable;
}
