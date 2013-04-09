<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Reg extends Controller_Main{
	
	/**
	 * 
	 * 注冊界面Action
	 */
	function action_index()
	{
		$this->response->body(View::factory('reg')->render());
	}
	
	function action_next()
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
			$this->request->redirect(URL::site('login'));
		}
		catch (ORM_Validation_Exception $e)
		{
			$errors = $e->errors('register');
			$errors = array_merge($errors, ( isset($errors['_external']) ? $errors['_external'] : array() ));
			Web::error($errors);
		}
	}
} // End View
