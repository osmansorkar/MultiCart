<?php
namespace OsmanSorkar\MultiCart\Model;

use OsmanSorkar\MultiCart\Api\Data\ProfileInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\ConfigurableProduct\Model\ResourceModel\Product\Type\Configurable\Attribute\CollectionFactory;

/**
 * Class Post
 * @package OsmanSorkar\Blog\Model
 */
class Profile extends \Magento\Framework\Model\AbstractModel implements ProfileInterface,IdentityInterface
{

	const CACHE_TAG='osmansorkar_multicart_profile';

	/**
	 * @{initialize}
	 */
	function _construct()
	{
		$this->_init('OsmanSorkar\MultiCart\Model\ResourceModel\Profile');
	}
	
	 /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    public function getId(){
    	return $this->getData(self::ENTITY_ID);
    }
    public function getUserId(){
    	return $this->getData(self::USER_ID);
    }
    public function getImage(){
    	return $this->getData(self::IMAGE);
    }
    public function getShopName(){
    	return $this->getData(self::SHOP_ID);
    }
    public function getAdminCommission(){
    	return $this->getData(self::ADMIN_COMMISSION);
    }
    public function getTotalAdminCommission(){
    	return $this->getData(self::TOTAL_ADMIN_COMMISSION);
    }
    public function getTotalSelllerAmount(){
    	return $this->getData(self::TOTAL_SELLER_AMOUNT);
    }
    public function getTotalSellerPaid(){
    	return $this->getData(self::TOTAL_SELLER_PAID);
    }
    
    public function setId($id){
    	$this->setData(self::ENTITY_ID,$id);
    	return $this;
    }
    public function setUserId($id){
    	$this->setData(self::USER_ID,$id);
    	return $this;
    }
    public function setImage($image){
    	$this->setData(self::IMAGE,$image);
    	return $this;
    }
    public function setShopName($name){
    	$this->setData(self::SHOP_NAME,$name);
    	return $this;
    }
    public function setAdminCommission($commission){
    	$this->setData(self::ADMIN_COMMISSION,$commission);
    	return $this;
    }
    public function setTotalAdminCommission($commission){
    	$this->setData(self::TOTAL_ADMIN_COMMISSION,$commission);
    	return $this;
    }
    public function setTotalSelllerAmount($amount){
    	$this->setData(self::TOTAL_SELLER_AMOUNT,$amount);
    	return $this;
    }
    public function setTotalSellerPaid($amount){
    	$this->setData(self::TOTAL_SELLER_PAID,$amount);
    	return $this;
    }
    public function loadProfileById($id){
    	$data = $this->getResource()->loadProfileById($id);
        if ($data !== false) {
            $this->setData($data);
        }
        return $this;
    }
    public function getAllProductId(\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collection){
  		return $collection->create()->addFieldToFilter("product_user_id",$this->getUserId())->getAllIds();    	
    }
}