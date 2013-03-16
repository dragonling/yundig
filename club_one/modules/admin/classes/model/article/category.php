<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Category
 *
 * @package    Model
 * @author     Dragon
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Article_Category extends ORM {
 
	protected $_table_name = 'article_category';
	
	protected $_primary_key = 'id';
	
	public    $many_language = true;
 }