<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  Demo 示例
 *
 * @package    Kohana/Admin/Demo
 * @category   Controllers
 * @author     Shunnar
 */
class Controller_Common_Map extends Controller{
	
	function before()
	{
		parent::before();

		//设定系统语言
		list($this->sys_language_id, $this->sys_language) = Common::sys_language();
		I18n::$source = ($this->sys_language == '' ? I18n::$source : $this->sys_language);
	}
	
	function action_google_map()
	{
		$this->response->body(View::factory('google_map'));
	}
}