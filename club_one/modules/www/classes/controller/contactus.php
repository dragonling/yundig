<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contactus extends Controller_Main{
	
	function action_index()
	{
		$this->response->body(View::factory('contactus')->render());
	}
} // End View
