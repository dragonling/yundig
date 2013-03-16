<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * admin right
 *
 * @package    Admin/Right
 * @author     Dragon
 * @copyright  
 */
 class Model_Admin_Roles extends ORM {
 
	protected $_table_name = 'admin_roles';
	
	protected $_has_many    = array('language' => array('model' => 'admin_roles', 'through' => 'admin_roles_language', 'foreign_key' => 'roles_id')); 
	
	protected $_primary_key = 'id';
	
	public    $many_language = true;
	
 }