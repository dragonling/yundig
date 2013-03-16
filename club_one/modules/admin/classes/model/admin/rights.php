<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * admin right
 *
 * @package    Admin/Right
 * @author     Dragon
 * @copyright  
 */
 class Model_Admin_Rights extends ORM {
 
	protected $_table_name = 'admin_rights';
	
	protected $_has_many    = array('language' => array('model' => 'admin_rights', 'through' => 'admin_rights_language', 'foreign_key' => 'rights_id')); 
	
	protected $_primary_key = 'id';
	
	public    $many_language = true;
	
 }