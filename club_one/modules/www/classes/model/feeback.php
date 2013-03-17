<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Feeback
 *
 * @package    Model
 * @author     Dragon
 * @copyright  (c) 2012-2015 YunDig Team
 */
 class Model_Feeback extends ORM {
 
	protected $_table_name = 'feeback';	
	
	protected $_primary_key = 'id';
	
	public    $many_language = FALSE;
 }