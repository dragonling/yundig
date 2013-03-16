<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Customer
 *
 * @package    Model
 * @author     Shunnar
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Article extends ORM {
 
	protected $_table_name = 'article';
	
	protected $_has_many    = array(
								'language' => array('model' => 'article_language', 'through' => 'article_language', 'foreign_key' => 'article_id', 'far_key' => 'article_id'),								
								'contents' => array('model' => 'article_contents', 'through' => 'article_contents', 'foreign_key' => 'article_id')
								); 
	
	protected $_primary_key = 'id';
	
	public    $many_language = true;
 }