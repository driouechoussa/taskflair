<?php

namespace Buildilume\core;

use ReflectionClass;
use ReflectionException;
use Exception;
use Closure;

class Container
{
    private array $bindings = [];
    private array $instances = [];

    /**
     * Register a binding with the container.
     */
    public function bind(string $abstract, $concrete = null)
    {
        if ($concrete === null) {
            $concrete = $abstract;
        }
        $this->bindings[$abstract] = $concrete;
    }

    /**
     * Register a shared (singleton) binding.
     */
    public function singleton(string $abstract, $concrete = null)
    {
        $this->bind($abstract, function ($container) use ($concrete, $abstract) {
            static $instance = null;
            if ($instance === null) {
                $instance = $container->resolve($concrete ?? $abstract);
            }
            return $instance;
        });
    }

    /**
     * Get the resolved instance for a given type.
     */
    public function get(string $id)
    {
        if ($this->has($id)) {
            return $this->resolve($id);
        }
        
        // If not explicitly bound, check if it's a resolvable class (autowiring)
        if (class_exists($id)) {
            return $this->resolve($id);
        }

        throw new Exception("Target [$id] is not bound and cannot be resolved.");
    }

    /**
     * Check if a type is bound in the container.
     */
    public function has(string $id): bool
    {
        return isset($this->bindings[$id]) || class_exists($id);
    }

    /**
     * Resolve a concrete type.
     */
    private function resolve($concrete)
    {
        // If it's a closure/factory, execute it and pass container instance
        if ($concrete instanceof Closure) {
            return $concrete($this);
        }

        if (isset($this->instances[$concrete])) {
            return $this->instances[$concrete];
        }

        try {
            $reflector = new ReflectionClass($concrete);
        } catch (ReflectionException $e) {
            throw new Exception("Target class [$concrete] does not exist.", 0, $e);
        }

        if (!$reflector->isInstantiable()) {
            throw new Exception("Target [$concrete] is not instantiable.");
        }

        $constructor = $reflector->getConstructor();

        // If no constructor, just instantiate and return
        if ($constructor === null) {
            return new $concrete;
        }

        $parameters = $constructor->getParameters();
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $type = $parameter->getType();
            if (!$type || $type->isBuiltin()) {
                if ($parameter->isDefaultValueAvailable()) {
                    $dependencies[] = $parameter->getDefaultValue();
                } else {
                    throw new Exception("Cannot resolve primitive/untyped dependency '{$parameter->getName()}' in class {$concrete}");
                }
            } else {
                $dependencies[] = $this->get($type->getName());
            }
        }

        $instance = $reflector->newInstanceArgs($dependencies);
        
        // If the binding is registered as a singleton, cache it
        // We look up if this concrete/abstract was a singleton bound
        // Actually, the closure handles singleton caching if it went through the singleton wrapper.
        // But for autowired services that are resolved directly by class name, we can return the new instance.

        return $instance;
    }
}
