<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Model;

use MageBarrett\Blog\Api\Data\BlogInterface;
use Magento\Framework\Model\AbstractModel;
use MageBarrett\Blog\Model\ResourceModel\Blog as BlogResource;

class Blog extends AbstractModel implements BlogInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(BlogResource::class);
    }

    /**
     * Get Blog ID
     * @return int|null
     */
    public function getBlogId(): int|null
    {
       return (int) $this->getData(self::BLOG_ID);
    }

    /**
     * Get Title
     * @return string
     */
    public function getTitle(): string
    {
        return (string) $this->getData(self::TITLE);
    }

    /**
     * Get Content Heading
     * @return string
     */
    public function getContentHeading(): string
    {
        return (string) $this->getData(self::CONTENT_HEADING);
    }

    /**
     * Get Content
     * @return string
     */
    public function getContent(): string
    {
        return (string) $this->getData(self::CONTENT);
    }

    /**
     * Get Created At
     * @return string
     */
    public function getCreatedAt(): string
    {
        return (string) $this->getData(self::CREATED_AT);
    }

    /**
     * Get Updated At
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return (string) $this->getData(self::UPDATED_AT);
    }

    /**
     * Get Sort Order
     * @return int
     */
    public function getSortOrder(): int
    {
        return (int) $this->getData(self::SORT_ORDER);
    }

    /**
     * Get Is Active
     * @return bool
     */
    public function getIsActive(): bool
    {
        return (bool) $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set Blog ID
     * @param int $blogId
     * @return BlogInterface
     */
    public function setBlogId(int $blogId): BlogInterface
    {
        return $this->setData(self::BLOG_ID, $blogId);
    }

    /**
     * Set Title
     * @param string $title
     * @return BlogInterface
     */
    public function setTitle(string $title): BlogInterface
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Set Content Heading
     * @param string $contentHeading
     * @return BlogInterface
     */
    public function setContentHeading(string $contentHeading): BlogInterface
    {
        return $this->setData(self::CONTENT_HEADING, $contentHeading);
    }

    /**
     * Set Content
     * @param string $content
     * @return BlogInterface
     */
    public function setContent(string $content): BlogInterface
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * Set Created At
     * @param string $createdAt
     * @return BlogInterface
     */
    public function setCreatedAt(string $createdAt): BlogInterface
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Set Updated At
     * @param string $updatedAt
     * @return BlogInterface
     */
    public function setUpdatedAt(string $updatedAt): BlogInterface
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * Set Sort Order
     * @param int $sortOrder
     * @return BlogInterface
     */
    public function setSortOrder(int $sortOrder): BlogInterface
    {
        return $this->setData(self::SORT_ORDER, $sortOrder);
    }

    /**
     * set Is Active
     * @param bool $isActive
     * @return BlogInterface
     */
    public function setIsActive(bool $isActive): BlogInterface
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

}
