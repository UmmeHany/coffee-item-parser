<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Catalog
{

    private $id;

    /*
     * @ORM\OneToMany(targetEntity="App\Entity\Items", mappedBy="catalog")
     */

    private $item;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->item = new ArrayCollection();
    }

    public function getItem()
    {
        return $this->item;
    }

    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }
}
