<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Services extends Controller_Main{
	
	function action_index()
	{
		$catalog = ORM::factory('catalog')->where('current_controller', '=', 'services')->find()->as_array();
		View::set_global('title', $catalog['seo_title'] == '' ? $catalog['title'] : $catalog['seo_title']);
		View::set_global('keywords', $catalog['seo_keywords']);
		View::set_global('description', $catalog['seo_description']);
		$this->response->body(View::factory('services')->render());
	}
} // End View
