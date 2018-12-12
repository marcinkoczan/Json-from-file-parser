<?php

namespace Parser\Entity;

class Price
{
    /** @var string */
    public $description;

    /** @var int */
    public $priceInEuro;

    /** @var \DateTime */
    public $arrivalDate;

    /** @var \DateTime */
    public $dueDate;

    /**
     * @return  string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param  string  $description
     * @return  self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return  int
     */
    public function getPriceInEuro(): int
    {
        return $this->priceInEuro;
    }

    /**
     * @param  int  $priceInEuro
     * @return  self
     */
    public function setPriceInEuro(int $priceInEuro): self
    {
        $this->priceInEuro = $priceInEuro;

        return $this;
    }

    /**
     * @return  \DateTime
     */
    public function getArrivalDate(): \DateTime
    {
        return $this->arrivalDate;
    }

    /**
     * @param  \DateTime  $arrivalDate
     * @return  self
     */
    public function setArrivalDate(\DateTime $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    /**
     * @return  \DateTime
     */
    public function getDueDate(): \DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param  \DateTime  $dueDate  defining how long will the item be available for sale (i.e. in a collection)
     * @return  self
     */
    public function setDueDate(\DateTime $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }
}
