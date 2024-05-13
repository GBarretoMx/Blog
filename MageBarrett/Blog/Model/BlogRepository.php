<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Model;

use MageBarrett\Blog\Api\BlogRepositoryInterface;
use MageBarrett\Blog\Api\Data\BlogInterface;
use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use MageBarrett\Blog\Model\ResourceModel\Blog as BlogResource;
use MageBarrett\Blog\Model\BlogFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use MageBarrett\Blog\Model\ResourceModel\Blog\CollectionFactory as BlogCollectionFactory;
use MageBarrett\Blog\Api\Data\BlogSearchResultsInterfaceFactory;

class BlogRepository implements BlogRepositoryInterface
{
    /**
     * @var BlogResource
     */
    protected BlogResource $resource;

    /**
     * @var \MageBarrett\Blog\Model\BlogFactory
     */
    protected BlogFactory $blogFactory;

    /**
     * @var BlogCollectionFactory
     */
    protected BlogCollectionFactory $blogCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected CollectionProcessorInterface $collectionProcessor;

    /**
     * @var BlogSearchResultsInterfaceFactory
     */
    protected BlogSearchResultsInterfaceFactory $searchResultsFactory;



    public function __construct(
        BlogResource $resource,
        BlogFactory $blogFactory,
        BlogCollectionFactory $blogCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        BlogSearchResultsInterfaceFactory $searchResultsFactory
    )
    {
        $this->resource = $resource;
        $this->blogFactory = $blogFactory;
        $this->blogCollectionFactory = $blogCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param BlogInterface $blog
     * @return Blog
     * @throws CouldNotSaveException
     */
    public function save(BlogInterface $blog)
    {
        try {
            $this->resource->save($blog);
        } catch (LocalizedException $e) {
            throw new CouldNotSaveException(__(
                'Could not save blog: %1',
                $e->getMessage()
            ));
        }
    }

    /**
     * Load Blog By given Blog Identity
     * @param  $blogId
     * @return BlogInterface
     * @throws NoSuchEntityException
     */
    public function getById($blogId)
    {
        $blog = $this->blogFactory->create();
        $this->resource->load($blog, $blogId);
        if (!$blog->getId()) {
            throw new NoSuchEntityException(__(
                'Blog with id "%1" does not exist.',
                $blogId
            ));
        }
        return $blog;
    }

    /**
     * Delete
     * @param BlogInterface $blog
     * @return true
     * @throws CouldNotDeleteException
     */
    public function delete(BlogInterface $blog)
    {
        try {
            $this->resource->delete($blog);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Blog: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @param $id
     * @return true
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }

    /**
     * Load Blog data collection by given search criteria
     * @param SearchCriteriaInterface $searchCriteria
     * @return \MageBarrett\Blog\Api\Data\BlogSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->blogCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }


}
