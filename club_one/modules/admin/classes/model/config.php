<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Customer
 *
 * @package    Model
 * @author     Shunnar
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Config extends ORM {
 
	protected $_table_name = 'config';
	
	protected $_has_many    = array('language' => array('model' => 'config', 'through' => 'config_language', 'foreign_key' => 'config_key')); 
	
	protected $_primary_key = 'id';
	
	public    $many_language = true;
 }