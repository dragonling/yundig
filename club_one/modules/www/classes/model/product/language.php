<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * 
 *
 * @package    Admin
 * @author     Dragon
 * @copyright  
 */
 class Model_Product_Language extends ORM {
 
	protected $_table_name  = 'product_language';
	protected $_primary_key = 'id';
	protected $_foreign_key = 'product_id';
	
	public function foreign_key()
	{
		return $this->_foreign_key;
	}
	
 }