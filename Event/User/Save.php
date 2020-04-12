<?php
namespace OsmanSorkar\MultiCart\Event\User;
use Magento\Framework\Event\ObserverInterface;
class Save implements ObserverInterface {
	protected $_sellerProfile;
    protected $_request;

	public function __construct(
        \OsmanSorkar\MultiCart\Model\Profile $sellerProfile,
        \Magento\Framework\App\Request\Http $request
			){
		$this->_request = $request;
		$this->_sellerProfile = $sellerProfile;
	}

	public function execute(\Magento\Framework\Event\Observer $observer) {
		$user = $observer->getEvent()->getObject();
		$profile=$this->_sellerProfile->loadProfileById($user->getId());
		$id = $profile->getId();
		$profile->setData($user->getData());
		$profile->setId($id);
		$profile->save();
	}
}