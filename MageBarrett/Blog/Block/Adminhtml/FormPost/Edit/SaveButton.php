<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Block\Adminhtml\FormPost\Edit;

use Magento\Backend\Block\Widget\Button;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends Button implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'id_hard' => 'save_post_form',
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'magebarrett_blog_blog_form.magebarrett_blog_blog_form',
                                'actionName' => 'save',
                                'params' => [
                                    true
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

}
