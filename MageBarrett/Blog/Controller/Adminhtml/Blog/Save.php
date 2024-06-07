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
                $blog_id = $this->getRequest()->getParam('blog_id');
                $title = $this->getRequest()->getParam('title');
                $content_heading = $this->getRequest()->getParam('content_heading');
                $content = $this->getRequest()->getParam('content');
                $is_active = $this->getRequest()->getParam('is_active');
                $sort_order = $this->getRequest()->getParam('sort_order');

                if (isset($blog_id) && $blog_id > 0) {
                    $editModel = $this->blogRepository->getById($blog_id);
                    $editModel->setTitle((string) $title);
                    $editModel->setContentHeading((string) $content_heading);
                    $editModel->setContent((string) $content);
                    $editModel->setIsActive((bool) $is_active);
                    $editModel->setSortOrder((int) $sort_order);
                    $this->blogRepository->save($editModel);
                    $this->messageManager->addSuccessMessage(__('Post edit successfully.'));
                    $resultRedirect->setPath('magebarrett_blog/blog/index');
                    return $resultRedirect;
                }


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

                $this->messageManager->addSuccessMessage(__('You saved the post.'));
            } catch (\Exception $exception){
                $this->messageManager->addErrorMessage($exception->getMessage());
            }
        }
        $resultRedirect->setPath('magebarrett_blog/blog/index');
        return $resultRedirect;
    }

}
