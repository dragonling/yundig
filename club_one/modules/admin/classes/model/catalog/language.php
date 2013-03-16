<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Catalog
 *
 * @package    Model
 * @author     Dragon
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Catalog_Language extends ORM {
 
	protected $_table_name = 'catalog_language';
	protected $_primary_key = 'id';
	protected $_foreign_key = 'catalog_id';
	
	public function foreign_key()
	{
		return $this->_foreign_key;
	}
	
 }