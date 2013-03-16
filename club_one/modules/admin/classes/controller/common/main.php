<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  Demo 示例
 *
 * @package    Kohana/Admin/Demo
 * @category   Controllers
 * @author     Shunnar
 */
class Controller_Common_Main extends Controller{
	
	function before()
	{
		parent::before();

		//设定系统语言
		list($this->sys_language_id, $this->sys_language) = Common::sys_language();
		I18n::$source = ($this->sys_language == '' ? I18n::$source : $this->sys_language);
	}
	/**
	 * 
	 * 后台登陆界面Action
	 */
	function action_login()
	{
		$title = I18n::get('text_login', 'login');
		
		$orm = ORM::factory('language')->where('status', '=', 1)->find_all();
		$languages = array(0 => I18n::get('text_default_language', 'common'));
		foreach ($orm as $v)
		{
			$languages[$v->id] = $v->name;
		}
		
		$language_id = Cookie::get('sys_language_id');
		$languages = Form::select('sys_language', $languages, $language_id, array('onchange' => 'submit()'));

		$this->response->body(View::factory('login', array('message' => $this->request->param("id"), 'languages' => $languages)));
		
	}
	
	function action_logout()
	{
		Auth::instance()->logout(TRUE);
		$this->request->redirect(URL::site('/admin/common/main/login'));
		//$this->response->body(View::factory('login', array('message'=>I18n::get('suc_logout', 'login'))));
	}
	
	function action_authorize()
	{
		if (Auth::instance()->login($_REQUEST['username'], $_REQUEST['password'], Arr::get($_REQUEST, 'remember', false) != false))
		{
			$this->request->redirect(Session::instance()->get_once('returnUrl', URL::site('/admin/dashboard/main/index')));
		}
		else 
		{
			$this->request->redirect(URL::site('/admin/common/main/login/'.I18n::get('err_login', 'login')));
		}		
	}
	function action_change_language()
	{
		$language_id = Arr::get($_GET, 'sys_language');
		$config = Kohana::$config->load('auth');
		$orm = ORM::factory('language')->where('id', '=', $language_id)->find();
		Cookie::set('sys_language_id', $language_id, $config['lifetime']);
		Cookie::set('sys_language', $orm->pack_name, $config['lifetime']);
		if(Auth::instance()->logged_in())
		{
			$this->request->redirect(URL::site('/admin/dashboard/main/index'));
		}
		else
		{
			$this->request->redirect(URL::site('/admin/common/main/login'));
		}
		
	}
	
	function action_clear()
	{
		if(Cache::instance()->delete_all())
		{
			echo I18n::get('suc_clear_cache', 'common');
		}
	}
	
}
?>