<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Customer
 *
 * @package    Model
 * @author     Shunnar
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Product_Category extends ORM {
 
	protected $_table_name = 'product_category';
	
	protected $_has_many    = array('language' => array('model' => 'product_category', 'through' => 'product_category_language', 'foreign_key' => 'category_id')); 
	
	protected $_primary_key = 'id';
	
	public    $many_language = true;
 }