<?php declare(strict_types=1);

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
