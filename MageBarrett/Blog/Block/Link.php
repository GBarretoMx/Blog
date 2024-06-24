<?php

namespace MageBarrett\Blog\Block;
use Magento\Framework\View\Element\Html\Link as HtmlLink;

class Link extends HtmlLink
{
    /**
     * Render block HTML
     * @return string
     */
    protected function _toHtml()
    {
        if ($this->getTemplate() != false){
            return parent::_toHtml();
        }
        return '<div class="blog-post"><a ' . $this->getLinkAttributes() . ' >' . $this->escapeHtml($this->getLabel()) . '</a></div>';

    }

}
