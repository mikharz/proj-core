<?php declare(strict_types=1);

namespace Core\Infrastructure;

use Core\Application\Contracts\ContainerInterface;
use Core\Application\Contracts\ErrorHandlerInterface;
use Core\Infrastructure\Contracts\ServiceProviderInterface;
use Core\Infrastructure\ErrorHandler\Sentry;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->register(ErrorHandlerInterface::class, Sentry::class);
    }
}
