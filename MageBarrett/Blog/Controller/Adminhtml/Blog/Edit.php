<?php

namespace MageBarrett\Blog\Controller\Adminhtml\Blog;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\Page;

class Edit extends Action implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('blog_id');
        $model = $this->_objectManager->create(\MageBarrett\Blog\Model\Blog::class);
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Post no longer exists.'));
                /**
                 * @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect
                 */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('MageBarrett_Blog::blog');
        $resultPage->getConfig()->getTitle()->prepend(
            $model->getId() ? $model->getTitle() :  __('New Post '));

        return $resultPage;
    }

}
