<?php defined('SYSPATH') or die('No direct script access.');

class Controller_About extends Controller_Main{
	
	function action_index()
	{
		$this->response->body(View::factory('about')->render());
	}
} // End View
