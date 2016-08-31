<?php
namespace OsmanSorkar\MultiCart\Model\ResourceModel\Profile;

/**
 * Class Collection
 * @package OsmanSorkar\Blog\Model\ResourceModel\Post
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	
	/**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    protected $_allSellerId;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('OsmanSorkar\MultiCart\Model\Profile', 'OsmanSorkar\MultiCart\Model\ResourceModel\Profile');
    }
    
    public function getAllSellerId(){
    	if(empty($this->_allSellerId)){
    	$this->_allSellerId=array_column($this->getData(),"user_id");
    	}
    	return $this->_allSellerId;
    }

}
