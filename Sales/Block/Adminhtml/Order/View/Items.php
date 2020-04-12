<?php
/**
 * Copyright � 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace OsmanSorkar\MultiCart\Sales\Block\Adminhtml\Order\View;

use Magento\Sales\Model\ResourceModel\Order\Item\Collection;
use Magento\Sales\Block\Adminhtml\Items\AbstractItems;

/**
 * Adminhtml order items grid
 */
class Items extends \Magento\Sales\Block\Adminhtml\Items\AbstractItems
{
	protected  $profileFactory;
	protected  $productFactory;
	protected   $adminSession;
	public function __construct(
			\OsmanSorkar\MultiCart\Model\ProfileFactory $profileFactory,
			\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productFactory,
			\Magento\Backend\Model\Auth\Session $adminSession,
			\Magento\Backend\Block\Template\Context $context,
			\Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry,
			\Magento\CatalogInventory\Api\StockConfigurationInterface $stockConfiguration,
			\Magento\Framework\Registry $registry,
			array $data = []
			)
	{
		parent::__construct($context, $stockRegistry, $stockConfiguration, $registry,$data);
		$this->profileFactory=$profileFactory;
		$this->productFactory=$productFactory;
		$this->adminSession=$adminSession;
	}

    /**
     * Retrieve required options from parent
     *
     * @return void
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _beforeToHtml()
    {
        if (!$this->getParentBlock()) {
            throw new \Magento\Framework\Exception\LocalizedException(__('Invalid parent block for this block'));
        }
        $this->setOrder($this->getParentBlock()->getOrder());
        parent::_beforeToHtml();
    }

    /**
     * Retrieve order items collection
     *
     * @return Collection
     */

    public function getItemsCollection()
    {
        return $this->getOrder()->getItemsCollection();
    }
    public function getUserAllProductId(){
        return $this->profileFactory->create()->loadProfileById($this->adminSession->getUser()->getId())->getAllProductId($this->productFactory);
    }
}
