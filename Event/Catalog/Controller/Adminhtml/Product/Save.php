<?php
namespace OsmanSorkar\MultiCart\Event\Catalog\Controller\Adminhtml\Product;
use Magento\Framework\Event\ObserverInterface;
class Save implements ObserverInterface {
	protected $authSession;
	public function __construct(
			\Magento\Backend\Model\Auth\Session $authSession
			){
		$this->authSession=$authSession;
	}
	/**
	 * @override
	 * @see ObserverInterface::execute()
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 * @see \Magento\Framework\App\Action\Action::dispatch()
	 * https://github.com/magento/magento2/blob/dd47569249206b217e0a9f9a9371e73fd7622724/lib/internal/Magento/Framework/App/Action/Action.php#L91-L92
		$eventParameters = ['controller_action' => $this, 'request' => $request];
		$this->_eventManager->dispatch('controller_action_predispatch', $eventParameters)
	 * @param \Magento\Framework\Event\Observer $observer
	 * @return void
	 */
	public function execute(\Magento\Framework\Event\Observer $observer) {
		$product = $observer->getEvent()->getProduct();
		if($product->isObjectNew()){
		$product->setData("product_user_id",$this->authSession->getUser()->getId());
		}
	}
}