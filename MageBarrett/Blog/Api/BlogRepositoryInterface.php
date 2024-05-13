<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Api;

use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\TestFramework\Exception\NoSuchActionException;
use MageBarrett\Blog\Api\Data\BlogInterface;
use MageBarrett\Blog\Api\Data\BlogSearchResultsInterface;

interface BlogRepositoryInterface
{
    /**
     * Save Blog
     * @param BlogInterface $blog
     * @return BlogInterface
     * @throws  LocalizedException
     */
    public function save(BlogInterface $blog);

    /**
     * Get Blog By ID
     * @param int $id
     * @return BlogInterface
     * @throws  LocalizedException
     */
    public function getById($id);

    /**
     * Delete Blog
     * @param BlogInterface $blog
     * @return void
     */
    public function delete(BlogInterface $blog);

    /**
     * Delete Blog By ID
     * @param int $id
     * @return bool on success
     * @throws NoSuchActionException
     * @throws LocalizedException
     */
    public function deleteById($id);


    /**
     * Retrieve Blog matching the specified criteria
     * @param SearchCriteriaInterface $searchCriteria
     * @return BlogSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);


}
