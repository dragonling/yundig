<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  Static Functions
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */
class Admin 
{
	public static function error($message)
	{
		$view = View::factory("error");
		View::set_global('title', "System Error");
		$view->message = $message;
		echo $view->render();
		exit;
	}
	
	
}
?>