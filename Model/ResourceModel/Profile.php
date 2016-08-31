<?php
namespace OsmanSorkar\MultiCart\Model\ResourceModel;
/**
 * Class Post
 * @package OsmanSorkar\Blog\Model\ResourceModel
 */
class Profile extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('multicart_profile', 'entity_id');
    }
    /**
     * Load data by specified username
     *
     * @param string $username
     * @return array
     */
    public function loadProfileById($id)
    {
    	$connection = $this->getConnection();
    
    	$select = $connection->select()->from($this->getMainTable())->where('user_id=:id');
    
    	$binds = ['id' => $id];
    
    	return $connection->fetchRow($select, $binds);
    }

}