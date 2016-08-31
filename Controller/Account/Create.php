<?php
namespace OsmanSorkar\MultiCart\Controller\Account;
use Magento\Framework\App\Action\Action;
class Create extends Action{
	public $resultPageFactory;
	public function __construct(
			\Magento\Framework\App\Action\Context $context,
			\Magento\Framework\View\Result\PageFactory $resultPageFactory
			){
		$this->resultPageFactory=$resultPageFactory;
		parent::__construct($context);
	}
	
	public function execute(){
		return $this->resultPageFactory->create();
	}
}