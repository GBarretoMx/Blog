<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Controller\Adminhtml\Blog;

use MageBarrett\Blog\Model\BlogFactory;
use MageBarrett\Blog\Model\BlogRepository;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\Model\View\Result\Redirect;
use MageBarrett\Blog\Model\Blog;

class Save extends Action implements HttpPostActionInterface
{
    /**
     * @var BlogFactory
     */
    protected BlogFactory $blogFactory;

    /**
     * @var BlogRepository
     */
    protected BlogRepository $blogRepository;


    public function __construct(
        Context $context,
        BlogFactory $blogFactory,
        BlogRepository $blogRepository
    )
    {
        $this->blogFactory = $blogFactory;
        $this->blogRepository = $blogRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        /**
         * @var Redirect $resultRedirect
         */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($this->getRequest()->getPostValue()) {
            try {
                /**
                 * @var Blog $model
                 */
                $model = $this->blogFactory->create();
                $model->setTitle((string) $this->getRequest()->getParam('title'));
                $model->setIsActive((bool) $this->getRequest()->getParam('is_active'));
                $model->setSortOrder((int) $this->getRequest()->getParam('sort_order'));
                $model->setContent((string) $this->getRequest()->getParam('content'));
                $model->setContentHeading((string) $this->getRequest()->getParam('content_heading'));
                $this->blogRepository->save($model);

                $this->messageManager->addSuccessMessage(__('You saved the blog.'));
            } catch (\Exception $exception){
                $this->messageManager->addErrorMessage($exception->getMessage());
            }
        }
        $resultRedirect->setPath('magebarrett_blog/blog/index');
        return $resultRedirect;
    }

}
