<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_System_Main extends Controller_Admin{
	
	function action_index()
	{		
		$this->template = View::factory("dashboard/main");	
	}
	function action_home()
	{
		$this->template = View::factory("dashboard/home");
	}
	/**
	 * 重写父类项目
	 * @see Controller_Admin::action_list()
	 */
	function action_list(){}
	function action_del(){}
	function action_edit(){}
	function action_add(){}
	function action_create(){}
	
}
?>