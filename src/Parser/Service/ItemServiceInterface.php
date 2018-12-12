<?php

namespace Parser\Service;

interface ItemServiceInterface
{   
    /**
     * @param int $collectionId
     *
     * @return Parser\Entity\Brand[]
     */
    public function getResultForCollectionId(int $collectionId);
}
