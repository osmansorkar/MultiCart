<?php
namespace OsmanSorkar\MultiCart\Controller\Account;
use Magento\Framework\App\Action\Action;
class Save extends Action{
	protected  $profileFactory;
	protected  $userFactory;
	protected  $sellerSession;
	protected  $urlModel;
	protected  $scopeConfig;
	public function __construct(
			\Magento\Framework\App\Action\Context $context,
			\OsmanSorkar\MultiCart\Model\ProfileFactory  $profileFactory,
			\Magento\Framework\UrlFactory $urlFactory,
			\Magento\User\Model\UserFactory $userFactory,
			\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
			){
		$this->profileFactory=$profileFactory;
		$this->userFactory=$userFactory;
		$this->urlModel=$urlFactory->create();
		$this->scopeConfig=$scopeConfig;
		parent::__construct($context);
	}
	
	protected function getVendorRule(){
		return $this->scopeConfig->getValue(
				'multicart_section/general/vendor_role',
				\Magento\Store\Model\ScopeInterface::SCOPE_STORE
				);
	}
	
	public function execute(){
		
		$resultRedirect =$this->resultRedirectFactory->create();
		$data = $this->getRequest()->getPostValue();
		/** @var $model \Magento\User\Model\User */
		$model = $this->userFactory->create();
		$model->setData($data);
		
		if($this->getVendorRule()==NULL && empty($this->getVendorRule())){
			$model->setIsActive('0');
		}
		else{
		$model->setRoleId($this->getVendorRule());
		}
		$profile=$this->profileFactory->create();
		try{
			$model=$model->save();
			$profile->setAdminCommission('10');
			$profile->setUserId($model->getId());
			$profile->save();
			$this->messageManager->addSuccessMessage("We save and create seller account");
			return $resultRedirect->setPath('cms/index/index');
		} catch (\Magento\Framework\Validator\Exception $e) {
            $messages = $e->getMessages();
            $this->messageManager->addMessages($messages);
            $resultRedirect->setPath("*/*/create");
		}
        catch (\Exception $e) {
            $this->messageManager->addException($e, __('We can\'t save the seller.'));
        }
        $resultRedirect->setPath("*/*/create");
        return $resultRedirect;
	}
	
}