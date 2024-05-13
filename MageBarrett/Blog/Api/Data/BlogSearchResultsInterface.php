<?php
namespace MageBarrett\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface BlogSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Blog List
     * @return \MageBarrett\Blog\Api\Data\BlogInterface[]
     */
    public function getItems();

    /**
     * Set Blog Id List
     * @param \MageBarrett\Blog\Api\Data\BlogInterface[] $items
     * @return BlogSearchResultsInterface
     */
    public function setItems(array $items);
}
