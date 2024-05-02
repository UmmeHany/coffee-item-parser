<?php

namespace App\Tests;

use App\Entity\Catalog;
use App\Service\Parser;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

class ParserTest extends TestCase
{

    public function testIsValidExtension(): void
    {

        $parser = $this->createMock(Parser::class);
        $parser->method('isValidExtension')->willReturn(true);
        $this->assertTrue($parser->isValidExtension('xml'));
    }

    public function testFetchContent(): void
    {
        $parser = $this->createMock(Parser::class);
        $parser->method('fetchContent')->willReturn('content');
        $this->assertEquals('content', $parser->fetchContent());
    }

    public function testGetExtension(): void
    {
        $parser = $this->createMock(Parser::class);
        $parser->method('getExtension')->willReturn('xml');
        $this->assertEquals('xml', $parser->getExtension());
    }

    public function testConvertToBooleanValue(): void
    {
        $parser = $this->createMock(Parser::class);
        $parser->method('convertToBooleanValue')->willReturn(false);
        $this->assertFalse(Parser::convertToBooleanValue('no'));
    }

    public function testParseContent(): void
    {
        $parser = $this->createMock(Parser::class);
        $catalog = $this->createMock(Catalog::class);
        $parser->method('parseContent')->willReturn($catalog);
        $this->assertEquals($catalog, $parser->parseContent('resource/feed.xml', Catalog::class));

    }

    public function testGetEncoder()
    {

        $parser = $this->createMock(Parser::class);
        $encoder = $this->createMock(XmlEncoder::class);
        $parser->method('getEncoder')->willReturn($encoder);
        $this->assertEquals($encoder, $parser->getEncoder());

    }

}
