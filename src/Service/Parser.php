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
    private $validFileExtensions;

    public function __construct()
    {
        $this->validFileExtensions = ['xml'];
    }

    public function isValidExtension(string $extension)
    {
        return in_array($extension, $this->validFileExtensions);
    }

    public function fetchContent(): string
    {
        return file_get_contents($this->filePath);
    }

    public function getExtension(): string
    {
        return pathinfo($this->filePath)['extension'];
    }

    public function getEncoder()
    {
        switch ($this->getExtension()) {
            case 'xml':
                return new XmlEncoder();
                // more cases can be introduced (json)

        }
    }

    public function parseContent(string $filePath, string $entityName)
    {

        $this->filePath = $filePath;
        $fileType = $this->getExtension();

        if (!$this->isValidExtension($fileType)) {
            throw new \Exception('Invalid file extension');
        }

        $this->encoder = [$this->getEncoder()];
        $this->normalizer = [
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, null, null, new ReflectionExtractor()),
        ];
        $this->serializer = new Serializer($this->normalizer, $this->encoder);

        return $this->serializer->deserialize($this->fetchContent(), $entityName, $fileType);
    }

    public static function convertToBooleanValue(string $description)
    {

        return !(strtolower($description) === 'no' || $description === "0");
    }

}
