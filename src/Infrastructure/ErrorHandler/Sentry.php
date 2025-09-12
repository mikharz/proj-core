<?php declare(strict_types=1);

namespace Core\Infrastructure\ErrorHandler;

use Core\Application\Contracts\ErrorHandlerInterface;

class Sentry implements ErrorHandlerInterface
{
    public function register(): void
    {
        \Sentry\init(
            [
                'dsn' => getenv('SENTRY_DSN') ?: null,
                'environment' => getenv('ENVIRONMENT') ?: null,
                'release' => getenv('VERSION') ?: null,
                'send_default_pii' => true,
            ],
        );
    }

    public function captureException(\Throwable $exception): void
    {
        \Sentry\captureException($exception);
    }
}