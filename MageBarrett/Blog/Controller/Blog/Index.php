<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Controller\Blog;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    protected PageFactory $pageFactory;



    public function __construct(
        PageFactory $pageFactory,
    )
    {
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        /**
         * @var  Page $resultPage
         */
        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__(''));
        return $resultPage;
    }

}
