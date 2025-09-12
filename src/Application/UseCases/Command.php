<?php declare(strict_types=1);

namespace Core\Application\UseCases;

use Core\Application\UseCases\Middlewares\EventDispatcherMiddleware;
use Core\Application\UseCases\Middlewares\ExceptionMiddleware;

/**
 * @extends UseCase<bool>
 */
abstract class Command extends UseCase
{
    protected function middlewares(): MiddlewareStack
    {
        return new MiddlewareStack()
            ->add(new ExceptionMiddleware())
            ->add(new EventDispatcherMiddleware());
    }
}
