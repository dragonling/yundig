<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * 
 *
 * @package    Admin
 * @author     Dragon
 * @copyright  
 */
 class Model_Article_Language extends ORM {
 
	protected $_table_name  = 'article_language';
	protected $_primary_key = 'id';
	protected $_foreign_key = 'article_id';
	
	public function foreign_key()
	{
		return $this->_foreign_key;
	}
	
 }