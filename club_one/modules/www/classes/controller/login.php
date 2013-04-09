<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller_Main{
	/**
	 * 
	 * 登錄界面Action
	 */
	function action_index()
	{
		$this->response->body(View::factory('login')->render());
	}
	
	
	function action_authorize()
	{
		if (User::instance()->login($_REQUEST['username'], $_REQUEST['password'],Arr::get($_REQUEST,'remember',false)!=false))
		{					// redirect to the user account
			//echo Debug::vars(Auth::instance()->get_user()); 显示所有信息
			//echo Debug::vars(Auth::instance()->logged_in('admin'));
			$this->request->redirect('/user');
		}
		else 
		{
			$this->request->redirect('/login');
		}		
	}
	
} // End View
