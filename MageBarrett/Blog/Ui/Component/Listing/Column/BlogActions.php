<?php

namespace MageBarrett\Blog\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class BlogActions extends Column
{
    /** URL path */
    const BLOG_URL_PATH_DELETE = 'magebarrett_blog/blog/delete';
    const BLOG_URL_PATH_DISABLE = 'magebarrett_blog/blog/disable';
    const BLOG_URL_PATH_EDIT = 'magebarrett_blog/blog/edit';

    protected UrlInterface $urlBuilder;


    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [])
    {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @inheirtDoc
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['blog_id'])){
                    /*$item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(self::BLOG_URL_PATH_EDIT, ['blog_id' => $item['blog_id']]),
                        'label' => __('Edit'),
                    ];*/

                    $title = $item['title'];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(self::BLOG_URL_PATH_DELETE, ['blog_id' => $item['blog_id']]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete %1', $title),
                            'message' => __('Are you sure you want to delete a %1 record?', $title),
                        ],
                        'post' => true,
                    ];
                    $item[$name]['disable'] = [
                        'href' => $this->urlBuilder->getUrl(self::BLOG_URL_PATH_DISABLE, ['blog_id' => $item['blog_id']]),
                        'label' => __('Disable/Enable'),
                        'confirm' => [
                            'title' => __('Disable/Enable %1', $title),
                            'message' => __('Are you sure you want to switch status a %1 record?', $title),
                        ],
                        'post' => true,
                    ];


                }
            }
        }
        return $dataSource;
    }

}
