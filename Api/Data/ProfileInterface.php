<?php 
namespace OsmanSorkar\MultiCart\Api\Data;
/**
* Blog Post Interface
* @api
*/
interface ProfileInterface
{
	/**#@+
     * Constants for keys of data array. Identical to the name of the setter in snake case
     */
    const ENTITY_ID                  	 = 'entity_id';
    const USER_ID                  		 = 'user_id';
    const IMAGE                    		 = 'image';
    const SHOP_NAME                      = 'shop_name';
    const ADMIN_COMMISSION               = 'admin_commission';
    const TOTAL_ADMIN_COMMISSION         = 'total_admin_Commssion';
    const TOTAL_SELLER_AMOUNT            = 'total_seller_amount';
    const TOTAL_SELLER_PAID              = 'total_seller_paid';
    /**#@-*/

	/**
	 * set ID
	 * @return init|null
	 */
    function getId();
    function getUserId();
    function getImage();
    function getShopName();
    function getAdminCommission();
    function getTotalAdminCommission();
    function getTotalSelllerAmount();
    function getTotalSellerPaid();
    
	function setId($id);
	function setUserId($id);
	function setImage($image);
	function setShopName($name);
	function setAdminCommission($commission);
	function setTotalAdminCommission($commission);
	function setTotalSelllerAmount($amount);
	function setTotalSellerPaid($amount);

}