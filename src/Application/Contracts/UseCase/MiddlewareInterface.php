<?php declare(strict_types=1);

namespace Core\Application\Contracts\UseCase;

use Core\Application\Contracts\UseCaseInterface;

interface MiddlewareInterface
{
    /**
     * @template TResult of mixed
     * @param UseCaseInterface<TResult> $useCase
     * @return TResult
     */
    public function process(UseCaseInterface $useCase): mixed;
}
