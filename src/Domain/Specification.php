<?php

namespace Core\Domain;

use Core\Domain\Exceptions\UnsatisfiedException;

abstract class Specification implements Contracts\SpecificationInterface
{
    public function isSatisfiedWithException(mixed $item): void
    {
        if (!$this->isSatisfiedBy($item)) {
            throw new UnsatisfiedException();
        }
    }
}
