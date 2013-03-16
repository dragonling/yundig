<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * admin right
 *
 * @package    Admin/Right
 * @author     Dragon
 * @copyright  
 */
 class Model_Admin_Roles_Language extends ORM {
 
	protected $_table_name  = 'admin_roles_language';
	protected $_primary_key = 'id';
	protected $_foreign_key = 'roles_id';
	
	public function foreign_key()
	{
		return $this->_foreign_key;
	}
 }