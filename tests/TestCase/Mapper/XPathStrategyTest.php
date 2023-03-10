<?php

namespace Tests\TestCase\Mapper;

use Tests\DataFixtures\Dto\XPathDestinationDto;
use Tests\DataFixtures\Model\XPath\RootSourceObject;

class XPathStrategyTest extends AbstractMapperTest
{
    public function testXPathMapperStrategy(): void
    {
        $source = new RootSourceObject();
        $mapper = $this->getMapper();
        /** @var XPathDestinationDto $dto */
        $dto = $mapper->convert($source, XPathDestinationDto::class);
        $this->assertEquals($dto->nodeA, $source->nodeA->inner->optionA);
        $this->assertEquals($dto->nodeB, $source->nodeA->inner->optionB);
    }
}