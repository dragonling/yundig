<?php defined('SYSPATH') or die('No direct script access.');

class Controller_News extends Controller_Main{
	
	function action_index()
	{
		$this->response->body(View::factory('news')->render());
	}
} // End View
