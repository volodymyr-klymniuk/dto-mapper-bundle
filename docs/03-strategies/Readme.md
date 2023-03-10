# Strategy annotations

Use strategy declaration to describe how **Mapper** should fetch value from *source* to mapped property.

Strategy without source used as *getter* with custom rule for value extraction.

**source** (optional) - Register strategy only to specific source object. Used as setter type.

Example behaviour with defined *source*:
```php

<?php

use DtoMapperBundle\Annotation\MappingMeta\DestinationClass;
use DtoMapperBundle\Annotation\MappingMeta\SourceClass;
use DtoMapperBundle\Annotation\MappingMeta\Strategy;
use DataMapper\MapperInterface;

/**
 * Class XPathDestinationDto
 * @DestinationClass
 */
class XPathDestinationDto
{
    /**
     * @Strategy\XPathStrategy(
     *     source="ConcreteSourceClass",
     *     xPath="variableWithInnerObject.innerObjectPropertyName"
     * )
     */
    public $destinationProperty;
}

/**
 * Class XPathDestinationDto
 * @SourceClass
 */
class ConcreteSourceClass
{
    /**
     * @var Inner
     */
    private $variableWithInnerObject;
    
    public function __construct()
    {
        $this->variableWithInnerObject = new Inner();
    }
}

class Inner
{
    private $innerObjectPropertyName = 10;
}

/** @var MapperInterface $mapper */
$dto = $mapper->convert(new ConcreteSourceClass(), XPathDestinationDto::class);
echo $dto->destinationProperty; // 10

```

- [chain](examples/chain.md)
- [formatter](examples/formatter.md)
- [getter](examples/getter.md)
- [service-closure](examples/service-closure.md)
- [static-closure](examples/static-closure.md)
- [xpath](examples/xpath.md)

[back](..)