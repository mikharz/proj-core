<?php

namespace Core\Application\Contracts;

/**
 * @template TResult of mixed
 */
interface UseCaseInterface
{
    /**
     * @return TResult
     */
    public function execute(): mixed;
}
