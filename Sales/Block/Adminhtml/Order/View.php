<?php
namespace OsmanSorkar\MultiCart\Sales\Block\Adminhtml\Order;

class View extends \Magento\Sales\Block\Adminhtml\Order\View{

    public function getShipUrl()
    {
        return $this->getUrl('seller/shipment/new');
    }

    public function getBackUrl()
    {

        return $this->getUrl('seller/*/');
    }

    protected function _isAllowedAction($resourceId)
    {
    	if($resourceId=='Magento_Sales::ship'){
    		return true;
    	}
        return $this->_authorization->isAllowed($resourceId);
    }
}