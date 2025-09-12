<?php

namespace Core\Application\UseCases;

use Core\Application\UseCases\Middlewares\ExceptionMiddleware;

/**
 * @extends UseCase<object>
 */
abstract class Query extends UseCase
{
    protected function middlewares(): MiddlewareStack
    {
        return new MiddlewareStack()
            ->add(new ExceptionMiddleware());
    }
}
