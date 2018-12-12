<?php
namespace Parser\Entity;

class Item
{
    /** @var string */
    public $name;

    /** @var string */
    public $url;

    /**
     * @var Price[]
     */
    public $prices = [];

    /**
     * @return  string
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  string  $name  Name of the item
     * @return  self
     */ 
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return  string
     */ 
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param  string  $url  Url of the item's page
     * @return  self
     * @throws \Exception
     */ 
    public function setUrl(string $url): self
    {
        if((new \Parser\Helper\UrlValidator($url))->validateUrl()) {
            $this->url = $url;
        } else {
            throw new \Exception('Url is not valid');
        }

        return $this;
    }

    /**
     * @return  Price[]
     */ 
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param  Price[]  $prices  actual search query.
     * @return  self
     */ 
    public function setPrices(Array $prices): self
    {
        $this->prices = $prices;

        return $this;
    }
}
