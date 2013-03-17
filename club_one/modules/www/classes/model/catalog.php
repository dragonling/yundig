<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Catalog
 *
 * @package    Model
 * @author     Dragon
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Catalog extends ORM {
 
	protected $_table_name = 'catalog';
	
	protected $_has_many   = array('language' => array('model' => 'catalog', 'through' => 'catalog_language', 'foreign_key' => 'catalog_id')); 
	
	protected $_primary_key = 'id';
	
	public    $many_language = true;
 }