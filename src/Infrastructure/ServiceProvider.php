<?php declare(strict_types=1);

namespace Core\Infrastructure;

use Core\Application\Contracts\ClockInterface;
use Core\Application\Contracts\ContainerInterface;
use Core\Application\Contracts\EnvironmentInterface;
use Core\Application\Contracts\ErrorHandlerInterface;
use Core\Application\Contracts\ServiceProviderInterface;
use Core\Infrastructure\Clock\Clock;
use Core\Infrastructure\ErrorHandler\Sentry;

class ServiceProvider implements ServiceProviderInterface
{
    public function bootstrap(
        EnvironmentInterface $environment,
        ContainerInterface $container,
    ): void {
        Clock::boot($environment);
        Sentry::boot($environment);

        $container
            ->register(ClockInterface::class, Clock::class)
            ->register(ErrorHandlerInterface::class, Sentry::class)
            ;
    }
}
