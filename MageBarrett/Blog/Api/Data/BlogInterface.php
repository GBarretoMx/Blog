<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Api\Data;


interface BlogInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const BLOG_ID                  = 'blog_id';
    const TITLE                    = 'title';
    const CONTENT_HEADING          = 'content_heading';
    const CONTENT                  = 'content';
    const CREATED_AT               = 'created_at';
    const UPDATED_AT               = 'updated_at';
    const SORT_ORDER               = 'sort_order';
    const IS_ACTIVE                = 'is_active';
    /**#@-*/


    /**
     * Get Blog ID
     * @return int|null
     */
    public function getBlogId():int|null;

    /**
     * Get Title
     * @return string
     */
    public function getTitle():string;

    /**
     * Get Content Heading
     * @return string
     */
    public function getContentHeading():string;

    /**
     * Get Content
     * @return string
     */
    public function getContent():string;

    /**
     * Get Created At
     * @return string
     */
    public function getCreatedAt():string;

    /**
     * Get updated At
     * @return string
     */
    public function getUpdatedAt():string;

    /**
     * Get Sort Order
     * @return int
     */
    public function getSortOrder():int;

    /**
     * Get Is Active
     * @return bool
     */
    public function getIsActive():bool;

    /**
     * Set Blog ID
     * @param int $blogId
     * @return BlogInterface
     */
    public function setBlogId(int $blogId);

    /**
     * Set Title
     * @param string $title
     * @return BlogInterface
     */
    public function setTitle(string $title);

    /**
     * Set Content Heading
     * @param string $contentHeading
     * @return BlogInterface
     */
    public function setContentHeading(string $contentHeading);


    /**
     * Set Content
     * @param string $content
     * @return BlogInterface
     */
    public function setContent(string $content);

    /**
     * Set Created At
     * @param string $createdAt
     * @return BlogInterface
     */
    public function setCreatedAt(string $createdAt);

    /**
     * Set Updated At
     * @param string $updatedAt
     * @return BlogInterface
     */
    public function setUpdatedAt(string $updatedAt);

    /**
     * Set Sort Order
     * @param int $sortOrder
     * @return BlogInterface
     */
    public function setSortOrder(int $sortOrder);

    /**
     * Set Is Active
     * @param bool $isActive
     * @return BlogInterface
     */
    public function setIsActive(bool $isActive);

}
