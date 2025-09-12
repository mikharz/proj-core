<?php declare(strict_types=1);

namespace Core\Domain\Contracts;

use Core\Domain\Exceptions\UnsatisfiedException;

interface SpecificationInterface
{
    public function isSatisfiedBy(mixed $item): bool;

    /**
     * @throws UnsatisfiedException
     */
    public function isSatisfiedWithException(mixed $item): void;
}
