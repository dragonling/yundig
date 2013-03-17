<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_User_Main{

	function before()
	{				
		parent::before();				
	}
	
	function action_info()
	{		
		if( ! User::instance()->logged_in())
		{			
			//$this->request->redirect('/user/login');
		}
		$user = User::instance()->get_user();
		print_r($user->as_array());
	}
	
	/**
	 * 
	 * 注冊界面Action
	 */
	function action_reg()
	{
		$this->response->body(View::factory('reg')->render());
	}
	
	function action_reg_next()
	{
		$this->model_name = 'user';
		$data  = $this->request->post();
		
		$day   = $this->request->post('day');
		$month = $this->request->post('month');
		$year  = $this->request->post('year');
		$data['brithday'] = "$year-$month-$day";
		$data['username'] = $data['email'];
		
		// EDIT: check using alternative rules
		try
		{
			$user = ORM::factory('user')->set_value($data)->save();
			print_r($user);
		}
		catch (ORM_Validation_Exception $e)
		{
			$errors = $e->errors('register');
			$errors = array_merge($errors, ( isset($errors['_external']) ? $errors['_external'] : array() ));
			print_r($errors);
		}
	}
	
	function action_update()
	{
		$user = User::instance()->get_user()->as_array();
		
		$user = ORM::factory('user', $user['id'])->set_value(array('username' => 'admin222', 'first_name' => 'Ling凌'))->save();
	}
	/**
	 * 
	 * 登錄界面Action
	 */
	function action_login()
	{
		$this->response->body(View::factory('login')->render());
	}
	
	function action_logout()
	{
		User::instance()->logout();
		$this->response->body(View::factory('login',array('success'=>'Logout')));
	}
	
	function action_authorize()
	{
		if (User::instance()->login($_REQUEST['username'], $_REQUEST['password'],Arr::get($_REQUEST,'remember',false)!=false))
		{					// redirect to the user account
			//echo Debug::vars(Auth::instance()->get_user()); 显示所有信息
			//echo Debug::vars(Auth::instance()->logged_in('admin'));
			$this->request->redirect('/user/info');
		}
		else 
		{
			$this->request->redirect('/user/login');
		}		
	}
	
}