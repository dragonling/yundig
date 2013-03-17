<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Posts
 *
 * @package    Model
 * @author     Dragon
 * @copyright  (c) 2008-2011 Vlc dev Team
 */
 class Model_Posts extends ORM {
 
	protected $_table_name = 'posts';
	
	protected $_has_many    = array(
								'language' => array('model' => 'posts_language', 'through' => 'posts_language', 'foreign_key' => 'posts_id', 'far_key' => 'posts_id'),								
								'contents' => array('model' => 'posts_contents', 'through' => 'posts_contents', 'foreign_key' => 'posts_id')
								); 
	
	protected $_primary_key = 'id';
	
	public    $many_language = true;
 }