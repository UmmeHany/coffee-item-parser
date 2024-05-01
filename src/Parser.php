
<?php



use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;



class Parser{

    public static function parseXml(string $content){

        $encoder      = [new XmlEncoder()];
        $normalizer   = [new ObjectNormalizer()];
        $serializer   = new Serializer($normalizer, $encoder);

        $data =   '<?xml version="1.0" encoding="UTF-8"?>
                         <shopping_cart>
                             <number>EO-10001</number>
                             <shopId>1</shopId>
                             <customerId>1</customerId>
                             <externalOrderId>222</externalOrderId>
                            
                         </shopping_cart>';

        $personObject = $serializer->deserialize($data, 'App\Entity\ShoppingCart', 'xml');

        dd($personObject);

    }



}
?>