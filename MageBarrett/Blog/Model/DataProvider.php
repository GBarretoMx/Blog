<?php

namespace MageBarrett\Blog\Model;

use Magento\Ui\DataProvider\AbstractDataProvider;
use MageBarrett\Blog\Model\ResourceModel\Blog\CollectionFactory as BlogCollectionFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var BlogCollectionFactory
     */
    protected BlogCollectionFactory $blogCollectionFactory;

    /**
     * @var array
     */
    protected $loadedData;

    public function __construct(
        BlogCollectionFactory $blogCollectionFactory,
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = [])
    {
        $this->blogCollectionFactory = $blogCollectionFactory;
        $this->collection = $blogCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }
        return $this->loadedData;
    }

}
