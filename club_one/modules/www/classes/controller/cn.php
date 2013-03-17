<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cn extends Controller_Main{
	
	function before()
	{
		isset($_GET['language_id']) ? '' : $_GET['language_id'] = 3;
		parent::before();
		
	}
} // End View
