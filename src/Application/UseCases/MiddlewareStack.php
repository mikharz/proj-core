<?php declare(strict_types=1);

namespace Core\Application\UseCases;

use Core\Application\Contracts\UseCase\MiddlewareInterface;

final class MiddlewareStack
{
    /**
     * @var array<class-string<MiddlewareInterface>, MiddlewareInterface>
     */
    private array $middlewares = [];

    public function add(MiddlewareInterface $middleware): self
    {
        $this->middlewares[$middleware::class] = $middleware;
        return $this;
    }

    public function shift(): ?MiddlewareInterface
    {
        return array_shift($this->middlewares);
    }
}
