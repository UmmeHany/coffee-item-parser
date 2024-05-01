<?php

namespace App\Repository;

use App\Entity\Items;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;

/**
 * @extends ServiceEntityRepository<Items>
 *
 */
class ItemsRepository extends ServiceEntityRepository
{
    private $registry;
    private LoggerInterface $logger;

    public function __construct(ManagerRegistry $registry,LoggerInterface $logger)
    {
        $this->registry = $registry;
        $this->logger = $logger;
        parent::__construct($registry, Items::class);
    }

    public function create(
     int $id,
     string $name,
     string $sku,
     string $description,
     string $shortDescription='',
     string $categoryName,
     string $brand,
     string $itemLink,
     string $imageLink,
     string $caffeineType,
     float $price,
     int $rating,
     int $facebook,
     int $count,
     bool $isFlavoured,
     bool $isSeasonal,
     bool $isInStock,
     bool $isKcup
     ): void
    {
        $itemObject=new Items();
        $itemObject->setId($id);
        $itemObject->setName($name);
        $itemObject->setSku($sku);
        $itemObject->setPrice($price);
        $itemObject->setCount($count);
        $itemObject->setCategoryName($categoryName);
        $itemObject->setBrand($brand);
        $itemObject->setCaffeineType($caffeineType);
        $itemObject->setDescription($description?:'');
        $itemObject->setShortDescription($shortDescription?:'');
        $itemObject->setInStock($isInStock);
        $itemObject->setImage($imageLink);
        $itemObject->setLink($itemLink);
        $itemObject->setFlavored($isFlavoured);
        $itemObject->setSeasonal($isSeasonal);
        $itemObject->setIsKcup($isKcup);
        $itemObject->setRating($rating);
        $itemObject->setFacebook($facebook);

        try{

            $this->getEntityManager()->persist($itemObject);
        
            $this->getEntityManager()->flush();

        }catch(\Exception $e){
            $this->logger->error($e->getMessage());
            $this->registry->resetManager();
        }
       
        
    }


}
