<?php

namespace Core\Application\UseCases\Middlewares;

use Core\Application\Contracts\UseCase\MiddlewareInterface;
use Core\Application\Contracts\UseCaseInterface;

class ExceptionMiddleware implements MiddlewareInterface
{
    public function process(UseCaseInterface $useCase): mixed
    {
        try {
            return $useCase->execute();
        } catch (\DomainException $exception) {
            throw new \RuntimeException(
                'Unhandled domain exception',
                previous: $exception,
            );
        }
    }
}
