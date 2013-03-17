<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Navigation
 *
 * @package    Model
 * @author     Dragon
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Navigation extends ORM {
 
	protected $_table_name = 'navigation';
	
	protected $_has_many   = array('language' => array('model' => 'navigation', 'through' => 'navigation_language', 'foreign_key' => 'navigation_id')); 
	
	protected $_primary_key = 'id';
	
	public    $many_language = true;
 }