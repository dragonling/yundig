<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  admin user manager
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_System_Setting extends Controller_Admin{
	
	function before()
	{		
		$this->_model_name = "config";
		
		$this->module = Arr::get($_REQUEST, 'm', 'www');
		parent::before();
	}
		
	/**
	 * 
	 * 通用编辑方法
	 */
	function action_edit()
	{
		//初始化 model配置 
		$this->init();
		$this->template = View::factory('system/setting');
		$language_id = Arr::get($_GET, 'language_id', 0);
		$module      = Arr::get($_GET, 'm', 'www');
		
		$modules = Common::realdir(MODPATH);
		
		$configs = array();
		$pop_modules = array('auth', 'cache', 'database', 'image', 'orm', 'userguide', 'codebench', 'core', 'pagination', 'unittest', 'xcache', 'admin', 'api');
		
		foreach ($modules as $m_name => $m)
		{
			if (in_array($m_name, $pop_modules) || strpos($m_name, '.') !== FALSE) continue;
		
			$tags[$m_name] = array(
					'id'       => '',
					'name'     => 'module_' . $m_name,
					'title'    => $m_name,
					'selected' => ($module == $m_name ? 'selected' : ''),
					'link' 	   => URL::query(array('language_id' => $language_id, 'm' => $m_name))
			);
		}
		
		$this->tabs['module_tabs'] = $tags;
		
		foreach (I18n::get('data_config_types', 'config') as $k => $v)
		{			
			$types[$k] = array(
					'id'       => '',
					'name'     => 'type_' . $k,
					'title'    => $v,
					'selected' => 'core' == $k ? 'selected' : '',
			);
		}
		$this->tabs['config_tabs'] = $types;
		$orm = ORM::factory($this->_model_name)->where('module', '=', $this->module)->where('language_id', '=', $language_id)->find_all()->as_array();
		if ( ! $orm)
		{
			$orm = ORM::factory($this->_model_name)->where('module', '=', $this->module)->where('language_id', '=', 0)->find_all()->as_array();
		}
		$customer_service = array('qq' => '', 'skype' => '', 'msn' => '', 'email' => '', 'tel' => '');
		$data = array('module' => $module, 'name' => '',  'title' => '', 'theme' => 'default',  'keywords' => '',  
					  'description' => '', 'beian' => '', 'copyright' => '', 'about_us' => '', 
					  'admin_email' => '', 'is_open' => 1, 'colse_why' => '', 'rewrite' => 1, 'upload_dir' => '', 'debug' => 1, 
					  'mail_type' => 'mail', 'smtp_host' => '', 'smtp_port' => '', 'smtp_account' => '', 'smtp_password' => '', 'customer_service' => $customer_service);
		
		foreach ($orm as $v)
		{
			$value = $v->value;
			if ($v->key == 'customer_service') $value = unserialize($value);			
			$data[$v->key] = $value;
			Kohana::$config->_write_config('site', $v->key, $value);
		}
		
		$themes = View::themes(MODPATH.'www/views/');
		
		$this->template->themes = $themes;
		$this->template->data = $data;
		return ;
	}
	function action_save()
	{
		$data = Arr::get($_POST, 'data', array());
		$data['logo'] = Arr::get($_POST, 'logo', '');
		$language_id = Arr::get($_POST, 'language_id', 0);
		if ( ! empty($data))
		{
			foreach ($data as $k => $v)
			{
				if ( ! empty($k))
				{
					$orm = ORM::factory($this->_model_name)->where('module', '=', $this->module)->where('key', '=', $k)->where('language_id', '=', $language_id)->find();
					$orm->set('module', $this->module)
						->set('language_id', $language_id)
						->set('key', $k)
						->set('value', (is_array($v) ? serialize($v) : $v))
						->save();
				}
			}
		}
		$this->request->redirect(URL::site('admin/'.$this->request->directory().'/'.$this->request->controller().'/edit').URL::query(array('language_id' => $language_id, 'm' => $this->module)));
		return;
	}
	
}