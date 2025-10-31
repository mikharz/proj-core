<?php declare(strict_types=1);

namespace Core\Infrastructure\ErrorHandler;

use Core\Application\Contracts\EnvironmentInterface;
use Core\Application\Contracts\ErrorHandlerInterface;

class Sentry implements ErrorHandlerInterface
{
    public static function boot(EnvironmentInterface $env): void
    {
        \Sentry\init(
            [
                'dsn' => $env->get('SENTRY_DSN'),
                'environment' => $env->string(),
                'release' => $env->get('RELEASE'),
                'send_default_pii' => true,
            ],
        );
    }

    public function captureException(\Throwable $exception): void
    {
        \Sentry\captureException($exception);
    }
}