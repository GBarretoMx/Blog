<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Controller\Adminhtml\Blog;

use MageBarrett\Blog\Api\BlogRepositoryInterface;
use MageBarrett\Blog\Model\BlogFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Disable extends Action implements HttpPostActionInterface
{

    /**
     * @var BlogRepositoryInterface
     */
    protected BlogRepositoryInterface $blogRepository;

    /**
     * @var BlogFactory
     */
    protected BlogFactory $blogFactory;

    public function __construct(
        Context $context,
        BlogRepositoryInterface $blogRepository,
        BlogFactory $blogFactory,

    )
    {
        $this->blogRepository = $blogRepository;
        $this->blogFactory = $blogFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('blog_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id){
            try {
                $recordBlog = $this->blogRepository->getById((int)$id);
                if ($recordBlog->getBlogId()){
                    $status = $recordBlog->getIsActive();
                    $switchStatus = !$status;
                    $recordBlog->setIsActive($switchStatus);
                    $this->blogRepository->save($recordBlog);
                    $this->messageManager->addSuccessMessage(__('The record has been switch status.'));
                }
            } catch (\Exception $exception){
                $this->messageManager->addErrorMessage($exception->getMessage());
            }
        }
        return $resultRedirect->setPath('magebarrett_blog/blog/index');
    }

}
