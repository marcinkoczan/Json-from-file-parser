<?php

namespace Parser\Service;

class PriceOrderedBrandService
{
    /** @var \stdClass */
    private $data;

    /** @var int */
    private $collectionId;

    /** @var array */
    private $minPricesInBrands;

    /**
     * @param \stdClass $data
     * @param int $collectionId
     */
    public function __construct(\stdClass $data, int $collectionId)
    {
        $this->data = $data;
        $this->collectionId = $collectionId;
    }

    private function getMinPricesInBrand()
    {
        $minPriceInBrand = [];
        foreach ($this->data->brands as $index => $brand) {
            $minPrice = null;
            foreach ($brand->items as $item) {
                foreach ($item->prices as $price) {
                    if (!$minPrice) {
                        $minPrice = $price->priceInEuro;
                    }
                    if ($price->priceInEuro < $minPrice) {
                        $minPrice = $price->priceInEuro;
                    }
                }
            }
            if ($minPrice) {
                $minPriceInBrand[$index] = $minPrice;
            }
        }

        $this->minPricesInBrands = $minPriceInBrand;
    }

    private function sortBrandsByMinPrices()
    {
        $this->minPricesInBrands = array_flip($this->minPricesInBrands);
        ksort($this->minPricesInBrands);
    }

    /**
     * @return array
     */
    private function getSortedBrands()
    {
        $data = (new \Parser\Helper\DataParser($this->data))->getResult();
        $sortedBrands = [];

        foreach ($this->minPricesInBrands as $brandIndex) {
            $sortedBrands[] = $data[$this->collectionId]->brands[$brandIndex - 1];
        }
        
        return $sortedBrands;
    }

    /**
     * @return Brand[]
     */
    public function getOrderedBrandsByPrice(): array
    {
        $this->getMinPricesInBrand();
        $this->sortBrandsByMinPrices();
        return $this->getSortedBrands();
    }
}
