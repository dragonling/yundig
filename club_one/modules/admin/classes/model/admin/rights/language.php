<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * admin right
 *
 * @package    Admin/Right
 * @author     Dragon
 * @copyright  
 */
 class Model_Admin_Rights_Language extends ORM {
 
	protected $_table_name  = 'admin_rights_language';
	protected $_primary_key = 'id';
	protected $_foreign_key = 'rights_id';
	
	public function foreign_key()
	{
		return $this->_foreign_key;
	}
	
 }