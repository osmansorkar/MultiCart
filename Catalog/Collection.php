<?php
namespace OsmanSorkar\MultiCart\Catalog;
class Collection extends \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory{
	public function create(array $data = array())
    {
    	$collectionFactory=parent::create($data);
    	$userId=$this->_objectManager->get("\Magento\Backend\Model\Auth\Session")->getUser()->getId();
    	$sellerCollection=$this->_objectManager->get("\OsmanSorkar\MultiCart\Model\ResourceModel\Profile\Collection");
    	$allSellerId=$sellerCollection->getAllSellerId();
    	if(in_array($userId, $allSellerId)){
    	$collectionFactory->addFieldToFilter("product_user_id",$userId);
    	}
		return $collectionFactory;
    }
}