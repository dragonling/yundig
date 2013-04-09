<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  User Main
 *
 * @package    User
 * @category   Controllers
 * @author     Dragon
 */
class Controller_User_Main extends Web{

	
	function action_update()
	{
		$user = User::instance()->get_user()->as_array();
		
		$user = ORM::factory('user', $user['id'])->set_value(array('username' => 'admin222', 'first_name' => 'Ling凌'))->save();
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
}