<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_Dashboard_Main extends Controller_Admin{
	
	function before()
	{
		$this->without_auth = TRUE;
		parent::before();
	}
	function action_index()
	{
		$this->template = View::factory("dashboard/main");	
		$orm = ORM::factory('language')->where('status', '=', 1)->find_all();
		$languages = array(0 => I18n::get('text_default_language', 'common'));
		foreach ($orm as $v)
		{
			$languages[$v->id] = $v->name;
		}
		
		$language_id = Cookie::get('sys_language_id');
		$data = Form::select('sys_language', $languages, $language_id, array('onchange' => 'submit()'));
		
		$this->template->languages = $data;
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