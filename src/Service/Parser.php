<?php

namespace App\Service;

use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Parser
{

    private $encoder;
    private $normalizer;
    private $serializer;
    private $filePath;

    public function fetchContent()
    {
        return file_get_contents($this->filePath);

    }

    public function getExtension()
    {
        return pathinfo($this->filePath)['extension'];

    }

    public function getEncoder()
    {

        switch ($this->getExtension()) {
            case 'xml':
                return new XmlEncoder();

        }

    }

    public function parseContent(string $filePath)
    {

        $this->filePath = $filePath;

        $this->encoder = [$this->getEncoder()];
        $this->normalizer = [
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, null, null, new ReflectionExtractor()),
        ];
        $this->serializer = new Serializer($this->normalizer, $this->encoder);

        return $this->serializer->deserialize($this->fetchContent(), 'App\Entity\Catalog', $this->getExtension());

    }

    public static function convertToBooleanValue(string $description)
    {

        return !(strtolower($description) === 'no' || $description === "0");

    }
}
