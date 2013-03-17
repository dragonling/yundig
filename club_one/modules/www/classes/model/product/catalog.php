<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Customer
 *
 * @package    Model
 * @author     Dragon
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Product_Catalog extends ORM {
 
	protected $_table_name = 'product_catalog';
	
	protected $_primary_key = 'id';
	
	public    $many_language = false;
 }