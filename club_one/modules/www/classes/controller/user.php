<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_User_Main{

	function action_logout()
	{
		User::instance()->logout();
		$this->response->body(View::factory('login',array('success'=>'Logout')));
	}
}