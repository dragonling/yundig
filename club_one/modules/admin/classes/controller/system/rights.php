<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_System_Rights extends Controller_Admin{
	
	function before()
	{		
		$this->_model_name = "admin_rights";
		//$this->_many_language = true;
		
		parent::before();
	}
	/**
	 * 自定义显示列信息
	 * @see Controller_Admin::columns()
	 * @example
 	    $data =  parent::columns($data);
		$data['tid']['func'] = "md5";
		$data['tid']['name'] = "字段中文";
		$data['id']['desc'] = "字段的注释部分";
		return $cols;
	 */
	function list_columns($data)
	{
		$data = parent::list_columns($data);
		$columns = array('pk', 'id', 'sort_order', 'name', 'catalog_id', 'status');
		$data = Common::array_intersect_key($data, $columns);
		
		return $data;	
	}
	
	/**
	 * 重写修改应用列表显示方式
	 * @see Controller_Admin::action_list()
	 */
	function action_list()
	{		
		$this->init();
		
		$this->template = View::factory('treeview');	
	
		$this->template->self =  $this;
		
		//读取列信息 
		$this->template->columns = $this->list_columns($this->columns);
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		$data = Common::factory($this->_model_name, 'parent_id')->get_treeviews_data(0, array('id', 'pk', 'parent_id', 'sort_order', 'name', 'catalog_id', 'status'));
		$list = Common::make_treeviews($data);
		
		$catalogs = ORM::factory('catalog')->find_all()->as_array('id', 'title');
		unset($data);
		foreach($list as $k => $v)
		{
			$list[$k] = (object)$v;
			$list[$k]->catalog_id = isset($catalogs[$v['catalog_id']]) ? $catalogs[$v['catalog_id']] : '';
			$list[$k]->status = $this->toggle($list[$k], 'status');
		}
		return $this->template->data = $list;
	}
	/**
	 * 小窗口选择框列表
	 */
	function action_select_list()
	{
		$ids = $this->request->post('id');
		$act = $this->request->post('act');
		//如果post提交则完成选择
		if ($act)
		{
			die(json_encode($ids));
		}
		$keys = Arr::get($_GET, 'keys', '');
		$keys = explode(',', $keys);
		
		$this->init();
		
		$this->template = View::factory('mini_treeview');	
	
		$this->template->self =  $this;
		
		//读取列信息 
		$this->template->columns = $this->list_columns($this->columns);
		unset($this->template->columns['sort_order']);
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		$data = Common::factory($this->_model_name, 'parent_id')->get_treeviews_data(0, array('id', 'pk', 'parent_id', 'sort_order', 'name', 'catalog_id', 'status'));
		$list = Common::make_treeviews($data);
		
		$catalogs = ORM::factory('catalog')->find_all()->as_array('id', 'title');
		unset($data);
		foreach($list as $k => $v)
		{
			$v['checked'] = in_array($v['id'], $keys) ? 'checked' : '';
			$list[$k] = (object)$v;
			$list[$k]->catalog_id = isset($catalogs[$v['catalog_id']]) ? $catalogs[$v['catalog_id']] : '';
			$list[$k]->status = $this->toggle($list[$k], 'status');
		}
		$this->template->action_url = '';
		$this->template->data = $list;
	}
	/**
	 * 根据keys 取得权限名
	 */
	function action_get_names()
	{		
		$keys = Arr::get($_GET, 'keys', '');		
		
		die(implode(',', $this->get_names($keys)));
	}
	/**
	 * 根据keys 取得权限名
	 */
	public static function get_names($keys = '')
	{
		if ($keys == '') return array();
		
		$keys = explode(',', $keys);
		$rights = ORM::factory('admin_rights')->select('name')->where('id', 'in', $keys)->find_all()->as_array();
		$rights = Controller_Admin::bind_language('admin_rights', $rights, Common::language_id());
		$names = array();
		foreach ($rights as $v)
		{
			$names[] = $v->name;
		}
		return $names;
	}
	function action_edit()
	{	
		//初始化 model配置 
		$this->init();
		$this->template = View::factory('system/rights_add');	
		$primary_key = $this->request->param('id');
		if(empty($primary_key)) Admin::error("传入参数错误");
		
		$orm = ORM::factory($this->_model_name, $primary_key);
		$orm_lang = ORM::factory($this->_model_name.'_language');
		$orm->right = explode(',', $orm->right);
		$orm = $this->bind_language($this->_model_name, $orm, $this->language_id);
		
		$data = Common::factory($this->_model_name, 'parent_id')->get_treeviews_data(0);
		$list = Common::make_treeview_options($data);
		unset($list[$primary_key]);
		unset($data);
		
		$data = Common::factory('catalog', 'parent_id')->get_treeviews_data(0);
		$catalog_options = Common::make_treeview_options($data, 0, 'id', 'title');
		$catalog_options[0] = i18n::get('option_plases_select', 'system');
		unset($data);
		
//		print_r($orm->right);die;
      	//读取列信息 
		$this->template->columns = $this->columns;
		$this->template->data    = $orm;
		$this->template->rights  = $list;
		$this->template->catalog_options  = $catalog_options;
		$this->template->routes  = $this->get_routes();
		$this->template->modules = $this->get_modules();
		
		if (Arr::get($_GET, 'status', '') == 'success')
		{
			View::set_global('message', I18n::get('alt_update_success', 'system'));
		}
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
	}
	function action_add()
	{			
		//初始化 model配置 
		$this->init();
		$this->template = View::factory('system/rights_add');	
		$primary_key = $this->request->param('id');
		
		$orm = ORM::factory($this->_model_name, $primary_key);		
		$orm->right = array();
		
		$data = Common::factory($this->_model_name, 'parent_id')->get_treeviews_data(0);
		$list = Common::make_treeview_options($data);
		unset($data);
		
		$data = Common::factory('catalog', 'parent_id')->get_treeviews_data(0);
		$catalog_options = Common::make_treeview_options($data, 0, 'id', 'title');
		$catalog_options[0] = i18n::get('option_plases_select', 'system');
		unset($data);
		
      	//读取列信息 
		$this->template->columns = $this->columns;
		$this->template->data    = $orm;
		$this->template->rights  = $list;
		$this->template->catalog_options  = $catalog_options;
		$this->template->routes  = $this->get_routes();
		$this->template->modules = $this->get_modules();
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		unset($this->tabs['language']);
		
	}
	function action_save()
	{
		$pk = parent::action_save();
		
		if (isset($_POST['rights']))
		{
			$orm = ORM::factory($this->_model_name, $pk);
			$rights = Arr::get($_POST, 'rights', '');
			
			$rights = $rights != '' ? implode(',', $rights) : '';
			$orm->right = strtolower($rights);
			$orm->save();	
		}
		
		$query_string = URL::query(array('status' => 'success', 'language_id' => Arr::get($_POST, 'language_id', 0)));
		$this->request->redirect(URL::site('admin/'.$this->request->directory().'/'.$this->request->controller().'/edit/'.$this->request->param('param', '~').'/'.$pk).$query_string);
		exit;
	}
	
	/**
	 * 为Ajax 获取controllers and actions
	 *
	 */
	public function action_get_controllers()
	{
		$module = Arr::get($_GET, 'module', '');
		
		if ($module != '')
		{
			$dir = MODPATH.trim($module).'/classes/';
					
			$list = Core_Kodoc::class_methods(Kohana::list_files('controller', array($dir)));
	
			$controller['dirs']    = array(0 => I18n::get('text_select_dir', 'system'));
			foreach ($list as $classes => $methods)
			{
				$dirs = explode('_', $classes);
				
				if (count($dirs) > 2)
				{
					$controller['dirs'][$dirs[1]] = $dirs[1];
					
					$controller['files'][$dirs[1]][0]        = I18n::get('text_select_controller', 'system');
					$controller['files'][$dirs[1]][$dirs[2]] = $dirs[2];
					
					$controller['actions'][$dirs[1]][$dirs[2]][0] = I18n::get('text_select_action', 'system');
					foreach ($methods as $method)
					{
						$a = explode('_', $method);
						if ($a[0] == 'action')
						{
							$action = str_replace('action_', '', $method);
							$controller['actions'][$dirs[1]][$dirs[2]][$action] = $action;
						}
					}
				}				
			}			
			die(json_encode(array('status' => 'success', 'data' => $controller)));
		}
		die(json_encode(array('status' => 'fail')));
	}
	
	/**
	 * 取得所有路由
	 *
	 * @return unknown
	 */
	function get_routes()
	{
		$modules = Route::all();
		$arr = array(0 => I18n::get('text_select_route', 'system'));
		foreach ($modules as $k => $v)
		{
			$arr[$k] = $k;
		}
		return $arr;
	}
	
	/**
	 * 取得所有Modules 但除开一些系统Module 如：'auth', 'cache', 'database', 'image', 'orm', 'userguide'
	 *
	 * @return unknown
	 */
	public static function get_modules()
	{
		$modules = Kohana::modules();
		$arr = array(0 => I18n::get('text_select_module', 'system'));
		$pop_modules = array('auth', 'cache', 'database', 'image', 'orm', 'userguide');
		foreach ($modules as $k => $v)
		{
			if ( ! in_array($k, $pop_modules)) $arr[$k] = $k;
		}
		return $arr;
	}
	
}
?>