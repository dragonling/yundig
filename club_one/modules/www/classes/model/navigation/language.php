<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Navigation
 *
 * @package    Model
 * @author     Dragon
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Navigation_Language extends ORM {
 
	protected $_table_name = 'navigation_language';
	protected $_primary_key = 'id';
	protected $_foreign_key = 'navigation_id';
	
	public function foreign_key()
	{
		return $this->_foreign_key;
	}
	
 }