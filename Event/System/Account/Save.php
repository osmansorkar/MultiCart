<?php
namespace OsmanSorkar\MultiCart\Event\System\Account;
use Magento\Framework\Event\ObserverInterface;
class Save implements ObserverInterface {
    protected $_authSession;
    protected $_sellerProfile;

	public function __construct(
        \Magento\Backend\Model\Auth\Session $authSession,
        \OsmanSorkar\MultiCart\Model\Profile $sellerProfile
			){
        $this->_authSession = $authSession;
        $this->_sellerProfile = $sellerProfile;
	}

	public function execute(\Magento\Framework\Event\Observer $observer) {

	    $request= $observer->getRequest();
        $userId = $this->_authSession->getUser()->getId();
        $profile = $this->_sellerProfile->loadProfileById($userId);
		$profile->setImage($request->getParam("image"));
		$profile->setShopName($request->getParam("shop_name"));
		$profile->save();
	}
}