<?php
namespace Parser\Service;

class UnorderedBrandService implements \Parser\Service\BrandServiceInterface
{
    /**
     * @var ItemServiceInterface
     */
    private $itemService;

    /**
     * @var []
     */
    private $collectionNameToIdMapping = [
        "winter" => 1314575,
    ];

    /**
     * @param ItemServiceInterface $itemService
     */
    public function __construct(ItemServiceInterface $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * @param string $collectionName Name of the collection to search for.
     * @return \Parser\Entity\Brand[]
     */
    public function getBrandsForCollection($collectionName)
    {
        if (empty($this->collectionNameToIdMapping[$collectionName])) {
            throw new \InvalidArgumentException(sprintf('Provided collection name [%s] is not mapped.', $collectionName));
        }

        $collectionId = $this->collectionNameToIdMapping[$collectionName];
        $itemResults = $this->itemService->getResultForCollectionId($collectionId);
    }

    /**
     * @param \Parser\Service\ItemServiceInterface $itemService
     * @return void
     */
    public function setItemService(ItemServiceInterface $itemService)
    {
        $this->itemService = $itemService;
    }
}
