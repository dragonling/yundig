<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Customer
 *
 * @package    Model
 * @author     Shunnar
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Product extends ORM {
 
	protected $_table_name = 'product';
	
	protected $_has_many    = array(
								'language' => array('model' => 'product_language', 'through' => 'product_language', 'foreign_key' => 'product_id', 'far_key' => 'product_id'),								
								'contents' => array('model' => 'product_contents', 'through' => 'product_contents', 'foreign_key' => 'product_id')
								); 
	
	protected $_primary_key = 'id';
	
	public    $many_language = true;
 }