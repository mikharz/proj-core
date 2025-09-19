<?php declare(strict_types=1);

namespace Core\Application;

use Core\Application\Contracts\ClockInterface;
use Core\Application\Contracts\ContainerInterface;
use Core\Application\Contracts\EnvironmentInterface;
use Core\Application\Contracts\ErrorHandlerInterface;
use Core\Application\Contracts\ServiceProviderInterface;

final class Instance
{
    private static self $application;

    private function __construct(
        private readonly EnvironmentInterface $environment,
        private readonly ContainerInterface $container,
    ) {}

    public static function bootstrap(
        EnvironmentInterface $environment,
        ServiceProviderInterface ...$serviceProviders,
    ): void {
        $container = new Container();
        self::$application = new self(
            $environment,
            $container,
        );
        foreach ($serviceProviders as $serviceProvider) {
            $serviceProvider->register($container);
        }
        $container->get(ClockInterface::class)->bootstrap();
        $container->get(ErrorHandlerInterface::class)->bootstrap();
    }

    public static function environment(): EnvironmentInterface
    {
        return self::$application->environment;
    }

    public static function clock(): ClockInterface
    {
        return self::$application->container->get(ClockInterface::class);
    }

    public static function errorHandler(): ErrorHandlerInterface
    {
        return self::$application->container->get(ErrorHandlerInterface::class);
    }
}
