<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Hk extends Controller_Main{
	
	function before()
	{
		isset($_GET['language_id']) ? '' : $_GET['language_id'] = 2;
		parent::before();
		
	}
} // End View
