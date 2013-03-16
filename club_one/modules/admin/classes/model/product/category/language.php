<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * admin right
 *
 * @package    Admin/Right
 * @author     Dragon
 * @copyright  
 */
 class Model_Product_Category_Language extends ORM {
 
	protected $_table_name  = 'product_category_language';
	protected $_primary_key = 'id';
	protected $_foreign_key = 'category_id';
	
	public function foreign_key()
	{
		return $this->_foreign_key;
	}
	
 }