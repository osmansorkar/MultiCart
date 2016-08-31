<?php
namespace OsmanSorkar\MultiCart\Controller\Adminhtml\Order;

/**
 * Class Index
 * @package OsmanSorkar\Blog\Controller\Adminhtml\Post
 */
class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
	protected $resultPageFactory;

    /**
     * Index constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
	function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
		){

		$this->resultPageFactory=$resultPageFactory;
		parent::__construct($context);

	}
	public function execute(){
		
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('OsmanSorkar_Blog::post');
        $resultPage->addBreadcrumb(__('Blog Posts'), __('Blog Posts'));
        $resultPage->addBreadcrumb(__('Manage Blog Posts'), __('Manage Blog Posts'));
        $resultPage->getConfig()->getTitle()->prepend(__('Blog Posts'));

        return $resultPage;
	}

    /**
     * @return bool
     */
	public function _isAllowed(){
		return $this->_authorization->isAllowed("OsmanSorkar_MultiCart::order");
	}
}