<?php
 
namespace OsmanSorkar\MultiCart\Model\Config\Source;
 
class Role implements \Magento\Framework\Option\ArrayInterface
{
	protected $roleFactory;
	
	public function __construct(\Magento\Authorization\Model\RoleFactory $roleFactory){
		$this->roleFactory=$roleFactory;
	}
    /**
     * @return array
     */
    public function toOptionArray()
    {
    	$array=[];
    	$roles=$this->roleFactory->create()->getCollection()->addFieldToFilter("role_type","G");
    	foreach ($roles as $role){
    		$array[]=['value' => $role->getId(), 'label' => __($role->getRoleName())];
    	}
 	return $array;
    }
}