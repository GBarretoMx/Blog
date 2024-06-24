<?php
declare(strict_types=1);
namespace MageBarrett\Blog\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class GridBlogPost implements ArgumentInterface
{

    /**
     * FormatTitle
     * @param string $title
     * @return string
     */
    public function formatTitle(string $title):string
    {
        if (empty($title)) {
            return '';
        }

        if (strlen($title) > 40) {
            $title = substr($title, 0, 26) . '...';
        }

        return $title;
    }

}
