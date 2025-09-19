<?php declare(strict_types=1);

namespace Core\Application\Contracts;

interface ServiceProviderInterface
{
    public function register(ContainerInterface $container): void;
}
