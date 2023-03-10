# Naming Strategy annotations

## Use naming strategy to format properties/keys.
* Every naming strategy applies for all properties of mapped class.
* You can specify use case when strategy is applied. Every mapping declaration can be applied to:
  - all convert array-to-object or object-to-array calls;
  - or a specific source.

Use source to specify apply for a concrete source:
  - @SnakeCaseNamingStrategy(source="array")
  - @UnderscoreNamingStrategy(source="ClassName")

For all sources, add annotation without source declaration:
  - @SnakeCaseNamingStrategy.

## Array to Object convert annotation mapping.
To Use SnakeCaseNamingStrategy to format source keys naming.
Format array keys to match PSR convention property naming.

```php
<?php

use DataMapper\MapperInterface;
use DtoMapperBundle\Annotation\MappingMeta\NamingStrategy\SnakeCaseNamingStrategy;
use DtoMapperBundle\Annotation\MappingMeta\DestinationClass;

/**
 * Class ObjectToUnderscoreArrayDto
 * @DestinationClass
 * @SnakeCaseNamingStrategy
 */
class ClassName
{
    public $someKeyA;
    public $someKeyB;
}

$array = [
  'some_key_a' => 1,   
  'some_key_b' => 2,   
];

/** @var MapperInterface $mapper */
$dto = $mapper->convert($array, ClassName::class);

echo $dto->someKeyA; // 1
echo $dto->someKeyB; // 2

```

## Object to Array convert annotation mapping.

Use UnderscoreNamingStrategy if you want to serialize your object to array with _ naming delimiters.

```php
<?php

use DataMapper\MapperInterface;
use DtoMapperBundle\Annotation\MappingMeta\NamingStrategy\UnderscoreNamingStrategy;
use DtoMapperBundle\Annotation\MappingMeta\DestinationClass;

/**
 * Class ObjectToUnderscoreArrayDto
 * @DestinationClass
 * @UnderscoreNamingStrategy
 */
class ClassName
{
    public $someKeyA;
    public $someKeyB;
}

$obj = new ClassName();
/** @var MapperInterface $mapper */
$arr = $mapper->extract($obj);

\print_r($arr); // ['some_key_a' => 1, 'some_key_b' => 2]

```

- [format-keys](examples/format-keys.md)
- [renaming-keys](examples/renaming-keys.md)

[back](..)