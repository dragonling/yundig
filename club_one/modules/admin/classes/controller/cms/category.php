<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_Cms_Category extends Controller_Admin {

	function before()
	{		
		$this->_model_name = "article_category";
		
		parent::before();			
	}
}
?>