<?php declare(strict_types=1);

namespace Core\Application\Contracts;

interface ErrorHandlerInterface extends BootableInterface
{
    public function captureException(\Throwable $exception): void;
}
