<?php declare(strict_types=1);

namespace Core\Application\Contracts;

interface ErrorHandlerInterface
{
    public function register(): void;

    public function captureException(\Throwable $exception): void;
}
