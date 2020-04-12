<?php
namespace OsmanSorkar\MultiCart\Catalog;
class Collection extends \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory{
	public function create(array $data = array())
    {
    	$collectionFactory=parent::create($data);
    	$userModel=$this->_objectManager->get("\Magento\Backend\Model\Auth\Session")->getUser();
        $roleId = $userModel->getRole()->getId();
    	if($roleId == $this->getVendorRule()){
    	    $collectionFactory->addFieldToFilter("product_user_id",$userModel->getId());
    	}
		return $collectionFactory;
    }

    protected function getVendorRule(){
        $scopeConfig=$this->_objectManager->get("\Magento\Framework\App\Config\ScopeConfigInterface");

        return $scopeConfig->getValue(
            'multicart_section/general/vendor_role',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

}