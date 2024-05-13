<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Model;

use Magento\Framework\Api\SearchResults;
use MageBarrett\Blog\Api\Data\BlogSearchResultsInterface;

class BlogSearchResults extends SearchResults implements BlogSearchResultsInterface
{
}
