<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Model\ResourceModel\Blog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MageBarrett\Blog\Model\ResourceModel\Blog as BlogResource;
use MageBarrett\Blog\Model\Blog;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init( Blog::class, BlogResource::class);
    }

}
