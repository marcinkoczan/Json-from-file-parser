<?php

namespace Parser\Service;

class ItemService implements \Parser\Service\ItemServiceInterface
{
    /** @var array */
    private $data;

    public function __construct()
    {
        $this->getData();
    }

    /**
     * @param int $collectionId
     * @return array
     */
    public function getResultForCollectionId(int $collectionId): array
    {
        $items = [];

        if (!empty($this->data[$collectionId])) {
            foreach ($this->data[$collectionId]->brands as $brand) {
                foreach ($brand->items as $item) {
                    $items[] = $item;
                }
            }
        }

        return $items;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $fileData = \Parser\Helper\FileLoader::getFileData('data/1315475.json');
        if ($fileData) {
            $this->data = (new \Parser\Helper\DataParser(json_decode($fileData)))->getResult();
        }

        return $this->data;
    }
}
