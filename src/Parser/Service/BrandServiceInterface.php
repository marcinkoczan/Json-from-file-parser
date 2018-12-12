<?php

namespace Parser\Service;

interface BrandServiceInterface
{
    /**
     * @param string $collectionName
     * @return \Parser\Entity\Item[]
     */
    public function getItemsForCollection($collectionName);

    /**
     * @param \Parser\Service\ItemServiceInterface $itemService
     * @return void
     */
    public function setItemService(ItemServiceInterface $ItemService);
}
