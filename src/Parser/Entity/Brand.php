<?php
namespace Parser\Entity;

class Brand
{
    /** @var string */
    public $brand;

    /** @var string */
    public $description;

    /** @var Item[] */
    public $items = [];

    /**
     * @return  Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param  Item[]  $items
     *
     * @return  self
     */
    public function setItems(Array $items): self
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return  string
     */ 
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param  string  $description  Brand's description
     * @return  self
     */ 
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return  string
     */ 
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @param  string  $brand
     *
     * @return  self
     */ 
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }
}
