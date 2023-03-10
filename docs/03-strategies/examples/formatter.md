# @Annotation - Formatter Strategy

Strategy calls the "formatter" method from source object for extraction property value.

Example:
```php

<?php

use DtoMapperBundle\Annotation\MappingMeta\DestinationClass;
use DtoMapperBundle\Annotation\MappingMeta\Strategy;
use DtoMapperBundle\Annotation\MappingMeta\SourceClass;

/**
 * Class DestinationDto
 * @SourceClass
 */
class SourceObject
{
    /**
     * @Strategy\PropertyFormatterStrategy(method="formatValue")
     */
    public int $amount = 1000;

    public function formatValue(int $value): string
    {
        return \sprintf("%s %d %s", 'Bill: ', $value, ' - USD.');
    }
}

/**
 * Class DestinationDto
 * @DestinationClass
 */
class GetterDestinationDto
{
    public $amount;
}

use DataMapper\MapperInterface;

/** @var MapperInterface $mapper */
$dto = $mapper->convert(new SourceObject(), GetterDestinationDto::class);
echo $dto->amount; // Bill: 1000 - USD.
```

[back](..)