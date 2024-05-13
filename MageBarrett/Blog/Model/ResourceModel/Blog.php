<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Blog extends AbstractDb
{

    private const TABLE_NAME = 'magebarrett_blog';
    private  const FIEL_NAME = 'blog_id';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::FIEL_NAME);
    }

}
