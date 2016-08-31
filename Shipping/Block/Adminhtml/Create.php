<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace OsmanSorkar\MultiCart\Shipping\Block\Adminhtml;

/**
 * Adminhtml shipment create
 */
class Create extends \Magento\Backend\Block\Widget\Form\Container
{
	 public function getBackUrl()
    {
        return $this->getUrl(
            'seller/order'
        );
    }
}