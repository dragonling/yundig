<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Case extends Controller_Main{
	
	function action_index()
	{
		$this->response->body(View::factory('case')->render());
	}
} // End View
