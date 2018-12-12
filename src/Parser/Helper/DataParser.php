<?php

namespace Parser\Helper;

class DataParser
{
    /** @var \stdClass */
    private $data;

    /** @var \stdClass[] */
    private $result;

    /**
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data)
    {
        $this->setData($data);
        $this->parseData();
    }

    public function parseData()
    {
        if (!empty($this->data->brands)) {
            $this->data->brands = $this->parseBrands($this->data->brands);
        }

        $this->result[$this->data->id] = $this->data;
    }

    /**
     * @param \stdClass $brands
     * @return array
     */
    private function parseBrands(\stdClass $brands): array
    {
        $brandsArray = [];
        foreach ($this->data->brands as $brand) {
            $brandObj = new \Parser\Entity\Brand();
            $brandObj
                ->setBrand($brand->name)
                ->setDescription($brand->description)
                ->setItems($this->parseItems($brand->items));
            $brandsArray[] = $brandObj;
        }

        return $brandsArray;
    }

    /**
     * @param \stdClass $items
     * @return array
     */
    private function parseItems(\stdClass $items): array
    {
        $itemsArray = [];
        foreach ($items as $item) {
            $itemObj = new \Parser\Entity\Item();
            $itemObj
                ->setName($item->name)
                ->setUrl($item->url)
                ->setPrices($this->parsePrices($item->prices));
            $itemsArray[] = $itemObj;
        }

        return $itemsArray;
    }

    /**
     * @param \stdClass $prices
     * @return array
     */
    private function parsePrices(\stdClass $prices): array
    {
        $pricesArray = [];
        foreach ($prices as $price) {
            $priceObj = new \Parser\Entity\Price();
            $priceObj
                ->setDescription($price->description)
                ->setPriceInEuro($price->priceInEuro)
                ->setArrivalDate(new \DateTime($price->arrival))
                ->setDueDate(new \DateTime($price->due));
            $pricesArray[] = $priceObj;
        }

        return $pricesArray;
    }

    /**
     * Get the value of data
     */
    private function getData(): self
    {
        return $this->data;
    }

    /**
     * @param \stdClass $data
     * @return self
     */
    private function setData(\stdClass $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of result
     */
    public function getResult(): array
    {
        return $this->result;
    }
}
