<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Block\Adminhtml\FormPost\Edit;

use Magento\Backend\Block\Widget\Button;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class BackButton extends Button implements ButtonProviderInterface
{

    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('magebarrett_blog/blog/index');
    }



}
