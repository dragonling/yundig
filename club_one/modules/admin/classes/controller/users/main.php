<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Users
 * @category   Controllers
 * @author     Dragon
 */

class Controller_Users_Main extends Controller_Admin{
	
	function before()
	{		
		$this->_model_name = "user";
		parent::before();			
	}
	
}
?>