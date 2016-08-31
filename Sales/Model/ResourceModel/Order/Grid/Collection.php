<?php
namespace OsmanSorkar\MultiCart\Sales\Model\ResourceModel\Order\Grid;

use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Psr\Log\LoggerInterface as Logger;

class Collection extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult{
	
	public $orderFactory;
	public $profileFactory;
	public $productFactory;
	public  $adminSession;
	public function __construct(
			\Magento\Sales\Model\OrderFactory $orderFactory,
			\OsmanSorkar\MultiCart\Model\ProfileFactory $profileFactory,
			\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productFactory,
			\Magento\Backend\Model\Auth\Session $adminSession,
			EntityFactory $entityFactory,
			Logger $logger,
			FetchStrategy $fetchStrategy,
			EventManager $eventManager,
			$mainTable="sales_order_grid",
			$resourceModel="\Magento\Sales\Model\ResourceModel\Order"
			) {
		parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel);
		$this->orderFactory=$orderFactory;
		$this->profileFactory=$profileFactory;
		$this->productFactory=$productFactory;
		$this->adminSession=$adminSession;
		$this->removeOtherSellerOrder();
	}
	
	public function getTotalCount(){
		return count($this);
	}
	
	protected function removeOtherSellerOrder(){
		$allProductId=$this->profileFactory->create()->loadProfileById($this->adminSession->getUser()->getId())->getAllProductId($this->productFactory);
		foreach ($this as $key=>$order){
			$productsId=array();
			$products=$this->orderFactory->create()->load($order->getId())->getAllItems();
			foreach ($products as $product){
				$productsId[]=$product->getProductId();
			}
			if(count(array_intersect($allProductId,$productsId))==0){
					$this->removeItemByKey($key);
				}
		}
	}
}