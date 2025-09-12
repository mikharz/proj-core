<?php declare(strict_types=1);

namespace Core\Application\UseCases\Middlewares;

use Core\Application\Contracts\UseCase\MiddlewareInterface;
use Core\Application\Contracts\UseCaseInterface;

class EventDispatcherMiddleware implements MiddlewareInterface
{
    public function process(UseCaseInterface $useCase): mixed
    {
        return $useCase->execute();
    }
}
