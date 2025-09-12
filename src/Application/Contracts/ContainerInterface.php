<?php

namespace Core\Application\Contracts;

use Core\Application\Exceptions\UnresolvedDefinitionException;

interface ContainerInterface
{
    /**
     * @template TObject of object
     * @param class-string<TObject> $abstract
     * @return TObject
     * @throws UnresolvedDefinitionException
     */
    public function get(string $abstract): object;

    /**
     * @template TObject of object
     * @param class-string<TObject> $abstract
     * @param TObject $instance
     */
    public function set(string $abstract, object $instance): self;

    /**
     * @template TObject of object
     * @param class-string<TObject> $abstract
     * @param class-string<covariant TObject> $concrete
     */
    public function register(string $abstract, string $concrete): self;

    /**
     * @template TObject of object
     * @param class-string<TObject> $concrete
     * @return TObject
     * @throws UnresolvedDefinitionException
     */
    public function create(string $concrete): object;
}
