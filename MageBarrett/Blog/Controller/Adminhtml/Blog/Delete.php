<?php
declare(strict_types=1);
namespace MageBarrett\Blog\Controller\Adminhtml\Blog;

use MageBarrett\Blog\Api\BlogRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;


class Delete extends Action implements HttpPostActionInterface
{
    /**
     * @var BlogRepositoryInterface
     */
    protected BlogRepositoryInterface $blogRepository;

    public function __construct(
        Context $context,
        BlogRepositoryInterface $blogRepository,
    )
    {
        $this->blogRepository = $blogRepository;
        parent::__construct($context);
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('blog_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id) {
            try {
                $deleteRecord = $this->blogRepository->deleteById((int)$id);
                if (isset($deleteRecord) && $deleteRecord){
                    $this->messageManager->addSuccessMessage(__('The record has been deleted.'));
                } else {
                    $this->messageManager->addErrorMessage(__('The record has not been deleted.'));
                }
            } catch (\Exception $exception) {
                $this->messageManager->addErrorMessage($exception->getMessage());
            }
        }
        return $resultRedirect->setPath('magebarrett_blog/blog/index');

    }

}
