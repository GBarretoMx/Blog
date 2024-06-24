<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Block;

use MageBarrett\Blog\Model\ResourceModel\Blog\CollectionFactory;
use Magento\Framework\View\Element\Template;

class Pagination extends Template
{
    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * @param Template\Context $context
     * @param CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = [])
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }


    /**
     * @return $this|Pagination
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Post...'));
        if ($this->getCollection())
        {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'custom.history.pager')
                ->setAvailableLimit([3 => 3, 6 => 6, 9 => 9])
                ->setShowPerPage(true)
                ->setCollection($this->getCollection());
            $this->setChild('pager', $pager);
            $this->getCollection()->load();
        }
        return $this;

    }

    /**
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    /**
     * Get Collection
     * @return \MageBarrett\Blog\Model\ResourceModel\Blog\Collection
     */
    public function getCollection()
    {
        $page = $this->getRequest()->getParam('p') ?? 1;
        $pageSize = $this->getRequest()->getParam('limit') ?? 3;
        $collection = $this->collectionFactory->create();
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        return $collection;
    }

}
