<?php
namespace OsmanSorkar\MultiCart\Block\Seller\Account;
use Magento\Framework\View\Element\Template;
class Create extends Template {
	public function saveUrl(){
		return $this->_urlBuilder->getUrl("seller/account/save");
	}
}