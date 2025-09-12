<?php declare(strict_types=1);

namespace Core\Infrastructure\Contracts;

use Core\Application\Contracts\ContainerInterface;

interface ServiceProviderInterface
{
    public function register(ContainerInterface $container): void;
}
