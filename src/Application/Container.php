<?php

namespace Core\Application;

use Core\Application\Contracts\ContainerInterface;
use Core\Application\Exceptions\UnresolvedDefinitionException;

class Container implements ContainerInterface
{
    private static self $instance;

    /**
     * @var array<class-string, class-string>
     */
    private array $classes = [];

    /**
     * @var array<class-string, object>
     */
    private array $objects = [];

    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    public function get(string $abstract): object
    {
        $concrete = $this->classes[$abstract] ?? $abstract;
        if (!isset($this->objects[$concrete])) {
            $this->objects[$concrete] = $this->create($concrete);
        }
        return $this->objects[$concrete]; // @phpstan-ignore-line
    }

    public function set(string $abstract, object $instance): self
    {
        $concrete = $instance::class;
        $this->classes[$abstract] = $concrete;
        $this->objects[$concrete] = $instance;
        return $this;
    }

    public function register(string $abstract, string $concrete): self
    {
        $this->classes[$abstract] = $concrete;
        return $this;
    }

    public function create(string $concrete): object
    {
        try {
            $reflectionClass = new \ReflectionClass($concrete);
            $constructor = $reflectionClass->getConstructor();
            if (null === $constructor) {
                return $reflectionClass->newInstance();
            }

            $arguments = [];
            foreach ($constructor->getParameters() as $parameter) {
                $reflectionType = $parameter->getType();
                if (
                    $reflectionType instanceof \ReflectionNamedType
                    && !$reflectionType->isBuiltin()
                    && class_exists($reflectionType->getName())
                ) {
                    $arguments[] = $this->get($reflectionType->getName());
                    continue;
                }
                if (
                    $parameter->isDefaultValueAvailable()
                    || $parameter->isOptional()
                ) {
                    $arguments[] = $parameter->getDefaultValue();
                    continue;
                }
                throw new UnresolvedDefinitionException(
                    sprintf(
                        'Unresolved argument %s::%s($%s)',
                        $concrete,
                        $constructor->getName(),
                        $parameter->getName(),
                    ),
                );
            }

            return $reflectionClass->newInstanceArgs($arguments);
        } catch (\ReflectionException $exception) {
            throw new UnresolvedDefinitionException(
                'Reflection error',
                previous: $exception,
            );
        }
    }
}
