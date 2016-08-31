<?php 
/**
* 
*/
namespace OsmanSorkar\MultiCart\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $contex
     * @throws \Zend_Db_Exception
     */
	public function install(SchemaSetupInterface $setup,ModuleContextInterface $contex){
        /**
         * @var SchemaSetupInterface
         */
		$installer=$setup;

        /**
         * Start Setup
         */
		$installer->startSetup();

		 /**
         * Create table 'osmansorkar_blog_post'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('multicart_profile')
        )->addColumn(
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'ID'
        )->addColumn(
            'user_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'User ID'
        )->addColumn(
            'image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'User Photo'
        )->addColumn(
            'shop_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Shop Name'
        )->addColumn(
            'admin_commission',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => true],
            'Admin Commission Percentage'
        )
        ->addColumn(
            'total_admin_commission',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => true],
            'Total Admin Commission Percentage'
        )
        ->addColumn(
            'total_seller_amount',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => true],
            'Tatoal Seller Amount'
        )
        ->addColumn(
            'total_seller_paid',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => true],
            'Total Seller Paid'
        )->addIndex(
            $installer->getIdxName('osmansorkar_multicart_userinfo', ['user_id']),
            ['user_id']
        )->setComment(
            'MultiCart Profile'
        );
        $installer->getConnection()->createTable($table);
	}
}