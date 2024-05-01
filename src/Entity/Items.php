<?php

namespace App\Entity;

use App\Repository\ItemsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="items")
 * @ORM\Entity(repositoryClass=ItemsRepository::class)
 */
class Items
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer",unique=true,nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(name="category_name", type="string", length=255)
     */
    private $categoryName;

    /**
     * @ORM\Column(name="sku", type="string", length=255)
     */
    private $sku;

    /**
     * @ORM\Column(name="name",type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(name="short_description", type="string", length=255, nullable=true)
     */
    private $shortDescription;

    /**
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\Column(name="rating",type="integer", nullable=true)
     */
    private $rating = 0;

    /**
     * @ORM\Column(name="caffeine_type", type="string", length=255, nullable=true)
     */
    private $caffeineType;

    /**
     * @ORM\Column(name="count", type="integer")
     */
    private $count = 0;

    /**
     * @ORM\Column(name="flavored", type="boolean")
     */
    private $flavored;

    /**
     * @ORM\Column(name="seasonal", type="boolean")
     */
    private $seasonal;

    /**
     * @ORM\Column(name="in_stock",type="boolean")
     */
    private $inStock;

    /**
     * @ORM\Column(name="facebook", type="integer")
     */
    private $facebook;

    /**
     * @ORM\Column(name="is_Kcup",type="boolean")
     */
    private $isKCup;

    /*
     * @ORM\ManyToOne(targetEntity="App\Entity\Catalog", inversedBy="item")
     */
    private $catalog;

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of isKCup
     */
    public function getIsKCup()
    {
        return $this->isKCup;
    }

    /**
     * Set the value of isKCup
     *
     * @return  self
     */
    public function setIsKCup($isKCup)
    {
        $this->isKCup = $isKCup;

        return $this;
    }

    /**
     * Get the value of categoryName
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set the value of categoryName
     *
     * @return  self
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get the value of sku
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set the value of sku
     *
     * @return  self
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of shortDescription
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set the value of shortDescription
     *
     * @return  self
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set the value of brand
     *
     * @return  self
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of caffeineType
     */
    public function getCaffeineType()
    {
        return $this->caffeineType;
    }

    /**
     * Set the value of caffeineType
     *
     * @return  self
     */
    public function setCaffeineType($caffeineType)
    {
        $this->caffeineType = $caffeineType;

        return $this;
    }

    /**
     * Get the value of count
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set the value of count
     *
     * @return  self
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get the value of flavored
     */
    public function getFlavored()
    {
        return $this->flavored;
    }

    /**
     * Set the value of flavored
     *
     * @return  self
     */
    public function setFlavored($flavored)
    {
        $this->flavored = $flavored;

        return $this;
    }

    /**
     * Get the value of seasonal
     */
    public function getSeasonal()
    {
        return $this->seasonal;
    }

    /**
     * Set the value of seasonal
     *
     * @return  self
     */
    public function setSeasonal($seasonal)
    {
        $this->seasonal = $seasonal;

        return $this;
    }

    /**
     * Get the value of inStock
     */
    public function getInStock()
    {
        return $this->inStock;
    }

    /**
     * Set the value of inStock
     *
     * @return  self
     */
    public function setInStock($inStock)
    {
        $this->inStock = $inStock;

        return $this;
    }

    /**
     * Get the value of facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set the value of facebook
     *
     * @return  self
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get /*
     */
    public function getCatalog()
    {
        return $this->catalog;
    }

    /**
     * Set /*
     *
     * @return  self
     */
    public function setCatalog($catalog)
    {
        $this->catalog = $catalog;

        return $this;
    }
}
