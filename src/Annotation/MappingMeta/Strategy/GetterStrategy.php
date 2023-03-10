<?php

namespace DtoMapperBundle\Annotation\MappingMeta\Strategy;

use Doctrine\Common\Annotations\Annotation;
use DtoMapperBundle\Annotation\MappingMeta\Strategy\AbstractStrategy;
use DtoMapperBundle\Annotation\MappingMeta\Strategy\ChainStrategyInterface;

/**
 * @Annotation
 * @Annotation\Target({"PROPERTY", "ANNOTATION"})
 */
class GetterStrategy extends AbstractStrategy implements ChainStrategyInterface
{
    /**
     * @Required
     * @var string
     */
    public $method;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getStrategyClassName(): string
    {
        return \DataMapper\Strategy\GetterStrategy::class;
    }
}