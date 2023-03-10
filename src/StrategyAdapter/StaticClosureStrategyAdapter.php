<?php

namespace DtoMapperBundle\StrategyAdapter;

use DataMapper\Strategy\StrategyInterface;

class StaticClosureStrategyAdapter implements StrategyInterface
{
    private $serviceProvider;
    private $getter;

    public function __construct(string $serviceProvider, string $getter)
    {
        $this->serviceProvider = $serviceProvider;
        $this->getter = $getter;
    }

    public function hydrate($value, $context)
    {
        $callback = \call_user_func([$this->serviceProvider, $this->getter]);
        [$originSource] = $context;

        // User experience improve, change default args order.
        // 1 source - origin data
        // 2 value - current value of source object mapped property
        return $callback($originSource, $value);
    }
}