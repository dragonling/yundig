<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Friendly links
 *
 * @package    Model
 * @author     Dragon
 * @copyright  (c) 2012-2015 YunDig Team
 */
 class Model_Friendlylinks extends ORM {
 
	protected $_table_name = 'friendly_links';	
	
	protected $_primary_key = 'id';
	
	public    $many_language = FALSE;
 }