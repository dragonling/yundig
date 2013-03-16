<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  admin user manager
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_System_Theme extends Controller_Admin{
	
	function before()
	{
		$this->_model_name = 'config';
		parent::before();
	}
	
	function action_index()
	{
		$this->init();
		$orm = ORM::factory($this->_model_name)->where('key', '=', 'theme')->where('language_id', '=', Common::language_id())->find_all()->as_array('module');
		
		$this->template = View::factory('system/theme');	
	
		//$this->template->self =  $this;
		
		$modules = Common::realdir(MODPATH);
		
		$configs = array();
		foreach ($modules as $m_name => $m)
		{
			$views = Common::realdir($m.'/views');
			foreach ($views as $name => $v)
			{
				if (file_exists($v.'/config.conf'))
				{
					//echo $v.'/config.php';
					$configs[$m_name][$name] = Kohana::load($v.'/config.conf');
					$configs[$m_name][$name]['selected'] = (isset($orm[$m_name]) && $orm[$m_name]->value == $name ? TRUE : FALSE);
					$tags[$m_name] = array(
							'id'       => '',
							'name'     => 'module_' . $m_name,
							'title'    => $m_name,
							'selected' => '',
					);
				}
			}
		}
		
		$this->tabs['module_tabs'] = $tags;
		
		return $this->template->data = $configs;
		
	}
	
	function action_save()
	{
		$module = Arr::get($_GET, 'm', '');
		$value  = Arr::get($_GET, 'v', '');
		if ($module != '')
		{
			$orm = ORM::factory($this->_model_name)->where('module', '=', $module)->where('language_id', '=', Common::language_id())->where('key', '=', 'theme')->find();
			$orm->module = $module;
			$orm->language_id = Common::language_id();
			$orm->key = 'theme';
			$orm->value = $value;
			$orm->save();
		}
		$this->request->redirect(URL::site('/admin/system/theme').URL::query(array('language_id' => Common::language_id())));
		return;
	}
	
}