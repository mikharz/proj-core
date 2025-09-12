<?php declare(strict_types=1);

namespace Core\Application\UseCases;

use Core\Application\Contracts\UseCaseInterface;

/**
 * @template TResult of mixed
 * @implements UseCaseInterface<TResult>
 */
abstract class UseCase implements UseCaseInterface
{
    private ?MiddlewareStack $stack = null;

    abstract protected function middlewares(): MiddlewareStack;

    /**
     * @return TResult
     */
    abstract protected function process(): mixed;

    final public function execute(): mixed
    {
        if (null === $this->stack) {
            $this->stack = $this->middlewares();
        }
        $middleware = $this->stack->shift();
        if (null !== $middleware) {
            return $middleware->process($this);
        }
        $this->stack = null;
        return $this->process();
    }
}
