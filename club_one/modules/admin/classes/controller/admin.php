<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Automatic Basic Admin Controller.
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */
class Controller_Admin extends Controller
{
	protected  $model;
	protected  $_model_name;
	protected  $_many_language;
	/**
	 * @var  View  page template
	 */
	public $template ;
	
	/**
	 * 页面显示信息类型
	 * $this->info = 'abc'
	 */
	public $without_auth;
	public $location;
	public $tabs;
	public $info;
	public $error;
	public $warning;
	public $success;
	public $upload_dir = '/assets/uploads/';
	public $language_id = 0;
	public $sys_language_id = 0;
	public $sys_language = '';
	public $language_columns;
	public $role;
	public $page_rows = 20;
		
	function before()
	{
		parent::before();
		//设定系统语言
		list($this->sys_language_id, $this->sys_language) = Common::sys_language();		
		I18n::$source = ($this->sys_language == '' ? I18n::$source : $this->sys_language); 		
		$this->language_id = Arr::get($_GET, 'language_id', $this->sys_language_id);				
				
		if( ! Auth::instance()->logged_in())
		{
			Session::instance()->set('returnUrl', URL::site('/admin/dashboard/main/index'));
			$this->request->redirect(URL::site('/admin/common/main/login/'.I18n::get('err_auth', 'login')));
		}
		Kohana_Log::$write_on_add = TRUE;
		$this->role = Auth::instance()->get_role($this->language_id);
		
		if ($this->without_auth != TRUE) $this->check_rights();
		
		$rights_keys = Auth::instance()->get_rights_keys();
		$rights      = Auth::instance()->get_rights($this->language_id);	
		$right_arg   = explode('/', strtolower($this->request->uri()));
		
		while (count($right_arg) > 0)
		{
			$str = implode('/', $right_arg);
			if (isset($rights_keys[$str]))
			{
				$this->parent_node($rights_keys[$str], $rights);
				krsort($this->location);
				break;
			}
			elseif (in_array($str.'/', $rights_keys))
			{
				$this->parent_node($rights_keys[$str], $rights);
				krsort($this->location);
				break;
			}
			array_pop($right_arg);
		}
		if ($this->request->action() != 'list')
		{
			$referrer = Arr::get($_REQUEST, 'request_referrer', '') != '' ? Arr::get($_REQUEST, 'request_referrer', '') : $this->request->referrer();
			View::set_global('request_referrer', $referrer);
		}
	}
	
	function parent_node($id, $rights)
	{
		$link = $rights[$id]->type == 2 ? URL::site($rights[$id]->right) : '#';
		$this->location[] = array('link' => $link, 'title' => $rights[$id]->name);
		if ($rights[$id]->parent_id > 0)
		{
			$this->parent_node($rights[$id]->parent_id, $rights);
		}
	}
	/**
	 * 授权一个功能
	 * @param unknown_type $right
	 * @param unknown_type $param
	 * @param unknown_type $default
	 * @return boolean
	 */
	public static function auth_rights($right, $param = NULL, $default = NULL)
	{
		if (Auth::instance()->get_role()->super_admin == 1) return TRUE;
		
		$rights_keys = Auth::instance()->get_rights_keys();
		$rights = Auth::instance()->get_rights(Common::language_id());			
		$right_arg = explode('/', $right);
		
		while (count($right_arg) > 1)
		{
			$str = implode('/', $right_arg);
			if (isset($rights_keys[$str]))
			{
				return $rights[$rights_keys[$str]]->name;
			}
			elseif (isset($rights_keys[$str.'/']))
			{
				return $rights[$rights_keys[$str.'/']]->name;
			}
			array_pop($right_arg);
		}
		
		return FALSE;
	}
	/**
	 * 检测权限
	 * @return boolean
	 */
	function check_rights()
	{
		if (Auth::instance()->get_role()->super_admin == 1) return TRUE;
		
		$rights_keys = Auth::instance()->get_rights_keys();
		$right  = strtolower($this->request->uri());
		
		$right_arg = explode('/', $right);
		
		$str = '';
		foreach ($right_arg as $v)
		{
			$str .= $v;
			if (isset($rights_keys[$str]) || isset($rights_keys[$str.'/']))
			{
				return TRUE;
			}
			$str .= '/';
		}
		
		Admin::error(I18n::get('err_auth', 'login') . $right);
	}

	function action_index()
	{
		$this->request->redirect(URL::site('admin/'.$this->request->directory().'/'.$this->request->controller().'/list'));
	}
	/**
	 * 
	 * 模型初始化信息 在模型操作时使用
	 */
	function init()
	{
		$this->model = ORM::factory($this->_model_name);
		//读取列信息  表字段注释信息
		$this->table = $this->model->table_columns();		
		
		$this->columns = array_keys($this->table);		
		
		//获取主键名称 用于编辑删除操作
		$this->pk = $this->model->primary_key();
		

		if (isset($this->model->many_language) && $this->model->many_language === true)
		{
			$this->language_columns = self::language_columns($this->_model_name);
			
			$query_args = $_GET;
			unset($query_args['status']);
			
			$languages =  Common::languages();
			foreach ($languages as $k => $v)
			{
				$query_args['language_id'] = $v->id;
				 
				$languages[$k] = array(
						'id'       => (int) $v->id,
						'name'     => 'language_ '. (string) $v->id,
						'title'    => (string) $v->name,
						'selected' => $this->language_id == $v->id ? 'selected' : '',
						'link'     => URL::site($this->request->detect_uri()).URL::query($query_args, TRUE),
				);
			}
			$query_args['language_id'] = 0;
			$default = array(
					'id'       => 0,
					'name'     => 'default',
					'title'    => I18n::get('text_default_language', 'common'),
					'selected' => $this->language_id == 0 ? 'selected' : '',
					'link'     => URL::site($this->request->detect_uri()).URL::query($query_args, TRUE)
					);
			
			array_unshift($languages, $default);
			
			$this->tabs['language'] = $languages;
		}
		else
		{

			$_REQUEST['language_id'] = 0;
		}
		
	}
	function action_add()
	{
		$this->init();
		
		$this->template = View::factory('add');	
		
		//读取列信息 
		$this->template->columns = $this->blank_form_columns($this->columns);
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		unset($this->tabs['language']);
	}
	/**
	 * 
	 * 通用表单保存
	 * @return pk
	 */
	public function action_save()
	{
		//初始化 model配置 
		$this->init();
		
		//获取 POST数据
		$data = $this->request->post();

		//因为需要兼容Add 与 Edit操作   为 Add操作默认pk为NULL
		$data[$this->pk] = (isset($data[$this->pk]) && ! empty($data[$this->pk]) ? $data[$this->pk] : NULL);
		
		$primary_key = $data[$this->pk];
		$orm = ORM::factory($this->_model_name, $primary_key);
		
		if (isset($orm->many_language) && $data['language_id'] > 0 && $data[$this->pk] > 0)
		{
			$orm_language = ORM::factory($this->_model_name . '_language');
			$foreign_key = $orm_language->foreign_key();
			
			$orm_language = $orm_language->where($foreign_key, '=', $primary_key)
										 ->where('language_id', '=', intval($data['language_id']))
										 ->find();
			
			if ($orm_language->language_id == '')
			{
				$orm_language->$foreign_key = $primary_key;
				$orm_language->language_id = intval($data['language_id']);
				
			}
			
			foreach ($this->language_columns as $v)
			{
				isset($data[$v]) ? $orm_language->$v = $data[$v] : NULL;
			}
			$orm_language->save();
			$orm_language->reload();
			

			foreach($this->columns as $k=>$v)
			{
				if ( ! in_array($v, $this->language_columns))
				{					
					if (isset($data[$v]) && is_array($data[$v]))
					{
						$orm->$v = implode(',', $data[$v]);
					}
					elseif (isset($data[$v]) && $data[$v] !== NULL)
					{
						$orm->$v = $data[$v];
					}					
				}
				
			}
			$orm->save();
			$orm->reload();
		}
		else 
		{
			foreach($this->columns as $k=>$v)
			{
				if (isset($data[$v]) && is_array($data[$v]))
				{
					$orm->$v = implode(',', $data[$v]);
				}
				elseif (isset($data[$v]) && $data[$v] !== NULL)
				{
					$orm->$v = $data[$v];
				}
			}
			
			$orm->save();
			$primary_key = $orm->pk();
		}
		Xcache::delete_tag('TREEVIEWS_DATA');
		return $primary_key;
		
	}
	/**
	 * 
	 * 通用删除方法
	 */
	function action_del()
	{
		$this->init();
		$primary_key = $this->request->param('id');
		$list = Arr::get($_POST, $this->model->primary_key(), '');
		if ($primary_key > 0)	//删除单个
		{
			$orm = ORM::factory($this->_model_name, $primary_key);
			
			if ($orm->has_many())
			{
				foreach ($orm->has_many() as $k => $v)
				{
					$orm->remove($k);
				}				
			}
			
			$orm->delete();
			
		}
		elseif ( ! empty($list))	//通用批量删除方法
		{
			$orms = $this->model->where($this->model->primary_key(), 'in', $list)->find_all();
			foreach ($orms as $orm)
			{
				if ($orm->has_many())
				{
					foreach ($orm->has_many() as $k => $v)
					{
						$orm->remove($k);
					}					
				}
				$orm->delete();
				
			}
		}
		
		Xcache::delete_tag('TREEVIEWS_DATA');
		$this->page_list();
	}
	
	/**
	 * 
	 * 通用编辑方法
	 */
	function action_edit()
	{
		//初始化 model配置 
		$this->init();
		$this->template = View::factory('add');	
		$primary_key = $this->request->param('id');
		
		if(empty($primary_key))
		Admin::error(I18n::get('err_input_param', 'common'));
		$orm = ORM::factory($this->_model_name, $primary_key);
		if (isset($orm->many_language) && $orm->many_language == TRUE)
		{
			$orm = self::bind_language($this->_model_name, $orm, $this->language_id);
		}
      	//读取列信息 
		$this->template->columns = $this->full_form_columns($this->columns, $orm);
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;		
				
	}
	/**
	 * 
	 * 通用列表方法
	 * 
	 */
	function action_list()
	{
		$this->init();
		
		$this->template = View::factory('list');	
		
		//读取列信息 
		$this->template->columns = $this->list_columns($this->columns);
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		if (isset($this->pagination))
		{			
			$this->template->pagination = $this->pagination;
		}
		else
		{
			$total_rows = ORM::factory($this->_model_name)->count_all();
			
			$pagination = new Pagination(array(
				'total_items' => $total_rows, 
				'items_per_page' => $this->page_rows,  // set this to 30 or 15 for the real thing, now just for testing purposes...
			));
			
			$this->template->pagination = $pagination->render();
		}
		//数据信息
		if(isset($this->customer_data))
		{		
			return $this->template->data = $this->customer_data;
		}
		else
		{
			$page = Arr::get($_GET, 'page', 1);
			$orm = ORM::factory($this->_model_name);
			$data = $orm->select(array($this->_model_name.'.'.$orm->primary_key(), 'pk'))->offset(($page-1)*$this->page_rows)->limit($this->page_rows)->find_all();
			
			if ( ! empty($data) && isset($this->model->many_language) && $orm->many_language === true)
			{
				$data = $this->bind_language($this->_model_name, $data, Common::language_id());
			}
			return $this->template->data = $data;
		}
	}
	function action_toggle()
	{
		$column = $this->request->query('c');
		$id = $this->request->query('id');
		$orm = ORM::factory($this->_model_name, $id);
		$orm->$column = ($orm->$column == 0 ? 1 : 0);
		$orm->save();
		if($orm->saved())
		{
			$this->response->body(I18n::get('alt_toggle_success', 'common'));
		}
		else
		{
			$this->response->body(I18n::get('alt_toggle_fail', 'common'));
		}
		
		Xcache::delete_tag('TREEVIEWS_DATA');
	}
	/**
	 * 判断是否有Template处理，如果有就输出渲染到前台
	 * @see Kohana_Controller::after()
	 */
	function after()
	{
		//保存成功后转向List页面
		if("save" == $this->request->action())
		{
			$return = Arr::get($_REQUEST, 'save_return', 'request_referrer');
			
			switch($return)
			{
				case 'request_referrer':
					if (Arr::get($_REQUEST, 'request_referrer', '') != '')
						$this->request->redirect(Arr::get($_REQUEST, 'request_referrer', ''));
					else
						$this->page_list();	//转向List页面
					break;
					
				case 'list':
					$this->page_list();	//转向List页面
					break;
					
				case 'self':
					$this->request->redirect($this->request->referrer().URL::query(array('request_referrer' => Arr::get($_REQUEST, 'request_referrer', ''))));
					break;
			}
			return;
		}
		if (!empty($this->template))
		{
			View::bind_global('title', $this->title);			
			View::bind_global('tabs',  $this->tabs);			
			View::bind_global('location',  $this->location);
			
			$this->menu();
			//URL 前缀
			$this->template->pre_uri = URL::site('admin/'.$this->request->directory().'/'.$this->request->controller().'/');
			
	
			$this->template->self =  $this;
			$this->template->info     = $this->info;
			$this->template->error    = $this->error ;
			$this->template->warning  = $this->warning ;
			$this->template->success  = $this->success ;
			$this->response->body($this->template->render());
		}
		parent::after();	
	}
	/**
	 * 
	 * 后台管理导航菜单处理
	 */
	public static function menu()
	{
		$menu = Common::factory('admin_rights', 'parent_id')->sub(0, 1, array(array('column' => 'type', 'op' => '=', 'value' => 1)));
				
		$menu = self::bind_language('admin_rights', $menu, Common::language_id());
		$role = Auth::instance()->get_role(Common::language_id());
		
		if ($role)
		{
			if ($role->super_admin == 1)
			{
				return $menu;
			}
			$auth_roles = explode(',',	$role->rights);
			foreach ($menu as $k => $v)
			{
				if (array_search($v->id, $auth_roles) === FALSE)
				{
					unset($menu[$k]);
				}
			}
		}
		else
		{
			$menu = array();
		}
		return $menu;
	}
	
	/**
	 * 
	 * 列表中的列信息  子类可以overwrite 此方法自定义显示列
	 * 
	 * @param Array $data
	 */
	protected function list_columns($col)
	{
		foreach($col as $k=>$v)
		{
			//如果有注释 默认中文名为注释名
			$name_lang = I18n::get($v, 'table/'.$this->_model_name);
			
			$data[$v]['name'] = ( ! empty($this->table[$v]['comment']) && strtolower($name_lang) == strtolower($v)) ? $this->table[$v]['comment'] : $name_lang;
			$data[$v]['func'] = "strval";
			$data[$v]['desc'] = "";
			if(isset($this->table[$v]['character_maximum_length']))
			{
				$data[$v]['character_maximum_length'] = $this->table[$v]['character_maximum_length'];
			}
		}
		if (isset($data['lang_id']))
		{
			$data['lang_id']['func'] = "language_name";
		}
		
		return $data;		
	}
	/**
	 * 
	 * 编辑表单创建
	 * @param 字段数据 $col
	 * @param 表单数据模型 $orm
	 */
	protected function full_form_columns($col, $orm=NULL)
	{
		$data = $this->blank_form_columns($col,TRUE);

		
// 		print_r(Common::array_intersect_key($array1, $array2))
		foreach($col as $k=>$v)
		{
			if ($v == 'lang_id')
			{			
				//当是新增记录时 默认值为空			
				$data[$v]['field'] = Form::select($v, Common::languages(), $orm->$v);
				continue;
			}
			//为编辑表单赋值			
//			$data[$v]['field'] = Form::input($v, $orm->$v,array('id'=>'_'.$v,'class'=>'half title'));	
			if (isset($data[$v]['character_maximum_length']) && $data[$v]['character_maximum_length'] > 200)
			{
				$data[$v]['field'] = Form::textarea($v, $orm->$v, array('id'=>'_'.$v, 'class'=>'half textarea'));
			}
			else
			{
				$data[$v]['field'] = Form::input($v, $orm->$v, array('id'=>'_'.$v,'class'=>'half normal'));
			}
		}
		
		$pk = $this->pk;
		$data[$this->pk]['field'] = Form::input($this->pk, $orm->$pk,array('id'=>'_'.$this->pk,'class'=>'half normal','readonly'=>'readonly'));
		$data[$this->pk]['validate']['rules'] = '{required: false}';
		return $data;
	}
	/**
	 * 
	 * 表单中的字段信息  子类可以overwrite 此方法自定义
	 * 
	 * @param Array $data
	 * @param Bool $return_id
	 */
	protected function blank_form_columns($col, $return_id=FALSE)
	{
		//继承list中的标题
		$list_columns = $this->list_columns($col);

		foreach($col as $k=>$v)
		{
			if ($v == 'lang_id')
			{			
				//当是新增记录时 默认值为空			
				$data[$v]['field'] = Form::select($v, Common::languages(), 1);
				$data[$v]['name'] = isset($list_columns[$v]['name']) ? $list_columns[$v]['name'] : (empty($this->table[$v]['comment']) ? $v:$this->table[$v]['comment']);
				$data[$v]['desc'] = isset($list_columns[$v]['desc']) ? $list_columns[$v]['desc'] : "";		
				
					
				//eg {	required: true,	minlength: 5,equalTo: "#password"}
				$data[$v]['validate']['rules'] = '{required: true}';
				$data[$v]['validate']['message'] = '{required:" '.$data[$v]['name'].I18n::get('alt_required', 'common').'"}';
				
				continue;
			}
			
			//当是新增记录时 默认值为空
			if (isset($list_columns[$v]['character_maximum_length']) && $list_columns[$v]['character_maximum_length'] > 200)
			{
				$data[$v]['field'] = Form::textarea($v, NULL, array('id'=>'_'.$v, 'class'=>'half textarea'));
				$data[$v]['character_maximum_length'] = $list_columns[$v]['character_maximum_length'];
			}
			else
			{
				$data[$v]['field'] = Form::input($v,NULL,array('id'=>'_'.$v,'class'=>'half normal'));
			}
			
			$data[$v]['name'] = isset($list_columns[$v]['name']) ? $list_columns[$v]['name'] : (empty($this->table[$v]['comment']) ? $v:$this->table[$v]['comment']);
			$data[$v]['desc'] = isset($list_columns[$v]['desc']) ? $list_columns[$v]['desc'] : "";		
			
				
			//eg {	required: true,	minlength: 5,equalTo: "#password"}
			$data[$v]['validate']['rules'] = '{required: true}';
			$data[$v]['validate']['message'] = '{required:" '.$data[$v]['name'].I18n::get('alt_required', 'common').'"}';			
			
			
		}
		//默认添加情况下 表单中不显示pk
		
		if($return_id == FALSE) unset($data[$this->pk]);
		
		return $data;		
	}
	/**
	 * 
	 * test error
	 */
	public function action_error()
	{
		echo Debug::vars($this->request->controller());
	}
	/**
	 * 
	 * 跳转到列表页面
	 */
	protected function page_list()
	{
		$this->request->redirect(URL::site('admin/'.$this->request->directory().'/'.$this->request->controller().'/list/'.$this->request->param('param')));
	}
	static function strval($row, $column)
	{
		is_array($row) ? $row = (object) $row : '';
		return  $row->$column;
	}
	
	/**
	 * 
	 * 检查是否重复
	 * @param array $data = array('column' => 'value', 'column' => 'value')
	 * @param int $pk 
	 * @return array:
	 */
	public function check_unique($data = array(), $pk = NULL)
	{
		$check = array();
		if (is_array($data))
		{
			$orm = $this->model;
			foreach ($data as $column => $value)
			{
				$orm->or_where($column, '=', $value);
			}
			$orm = $orm->find_all()->as_array();
			
			foreach ($orm as $v)
			{
				foreach ($data as $column => $value)
				{
					if ($value == $v->$column && $v->pk() != $pk)
					{
						$check[$column] = $value;
					}
				}
				
			}
		}
		return $check;
	}
//--------------------------------------------------公共方法部分--------------------------------

	/**
	 * 
	 * 列表静态操作方法
	 * @param primary_key $id
	 */
	public static function handle($id, $row = NULL)
	{
		$request = new Request($_SERVER['PATH_INFO']);
		
		$param = '~/';
		if ($request->param('param') != '') $param = $request->param('param').'/'; 
		$edit = URL::site('admin/'.$request->directory().'/'.$request->controller().'/edit/'.$param.$id);
		$del  = URL::site('admin/'.$request->directory().'/'.$request->controller().'/del/'.$param.$id);
		$anchor = '<a href="'.$edit.'">'.HTML::image('assets/admin/images/icon_edit.gif', array('title' => I18n::get('alt_edit', 'common'))).'</a> ';
		$anchor.= '<a onclick="return confirm(\''.I18n::get('alt_comfirn_delete', 'common').'\', {call:function() { window.location = \''.$del.'\' } })" href="javascript:;">'.HTML::image('assets/admin/images/icon_del.gif', array('title' => I18n::get('alt_delete', 'common'))).'</a>';
		return $anchor;
	}
	/**
	 * 
	 * 列表顶部Filter表单HTML数据
	 */
	public static function filter()
	{		
		return FALSE;
	}
	/**
	 * 
	 * 页面Toggle开关选择
	 * @param 字段名 $col
	 * @param 更新记录ID $id
	 * @param 当前值 $bool
	 */

	function toggle($row, $column)
	{
		//is_array($row) ? $row = (object) $row : '';
		
		if(method_exists($row, 'pk'))
		{
			$pk = $row->pk();
		}
		elseif (isset($row->pk))
		{
			$pk = $row->pk;
		}
		
		$param = '~/';
		if ($this->request->param('param') != '') $param = $this->request->param('param').'/'; 
		$toggle = URL::site('admin/'.$this->request->directory().'/'.$this->request->controller().'/toggle/'.$param).URL::query(array('c' => $column, 'id' => $pk));
		
		if($row->$column)
			$toggle = "<a href='".$toggle."' class='toggle' onmouseover='currentToggle(\"".$column.$pk."\")'><img id='".$column.$pk."' src='".Kohana::$base_url."assets/admin/images/right.gif'/></a>";		
		else
			$toggle = "<a href='".$toggle."' class='toggle' onmouseover='currentToggle(\"".$column.$pk."\")'><img id='".$column.$pk."' src='".Kohana::$base_url."assets/admin/images/wrong.gif'/></a>";
		
		return $toggle;
	}
	/**
	 * 
	 * @param 图片地址 $source
	 */
	public static function show_image($row, $column)
	{
		return '<img src="'.$row->$column.'" width=50 height=50 />';
	}
	/**
	 * 
	 * @param 图片地址 $source
	 */
	public static function show_thumb($row, $column)
	{
		if (trim($row->$column) == '') return '';
		
		$img_types = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
		//获得文件扩展名
		$temp_arr = explode(".", $row->$column);
		$file_ext = array_pop($temp_arr);
		$file_ext = trim($file_ext);
		$file_ext = strtolower($file_ext);
		//检查扩展名
		if (in_array($file_ext, $img_types) === false)
		{
			$imgsrc = Kohana::$base_url.'assets/admin/images/file.png';
			$image = "<img src='{$imgsrc}' width=50 height=50 />";
			return "<a href='".URL::base('http').$row->$column."' target='_blank'>{$image}</a>";
		}
		else
		{
			$imgsrc = $row->$column;
			$image = "<img src='{$imgsrc}' width=50 height=50 />";
			return "<a href='".URL::base('http').$row->$column."' target='_ajax'>{$image}</a>";
		}
	}
	public static function language_name($id)
	{
		$langs = Common::languages();
		return isset($langs[$id]) ? $langs[$id] : '';
	}
	
	public static function language_columns($model_name)
	{
		$orig = ORM::factory($model_name)->as_array();
		$lang = ORM::factory($model_name . '_language')->as_array();

		$ins = array_intersect_key($orig, $lang);
		unset($ins['id']);
		
		return array_keys($ins);
	}
	
	public static function bind_language($model_name, $data, $language_id = 0)
	{
		if ($language_id == 0) return $data;
		
		if (method_exists($data, 'pk'))
		{
			$orm = ORM::factory($model_name . '_language');					
			$data_lang = $orm->where($orm->foreign_key(), '=', $data->pk())
			           ->where('language_id', '=', $language_id)
					   ->find()
					   ->as_array();
			
			if ($data_lang[$orm->primary_key()] != '')
			{
				foreach ($data_lang as $key => $value)
				{
					if ($key != $orm->primary_key() && isset($data->$key))
					{
						$data->$key = $value;
					}
				}
			}
		}
		else
		{
			$pks = array();
			foreach ($data as $v)
			{
				$pks[] = $v->pk();
			}
			if (count($pks) == 0) return $data;
			
			$orm = ORM::factory($model_name . '_language');
			$data_lang = $orm->where($orm->foreign_key(), 'in', $pks)
							 ->where('language_id', '=', $language_id)
							->find_all()
							->as_array($orm->foreign_key());
			$new_data = array();
			foreach ($data as $k => $v)
			{
				if (isset($data_lang[$v->pk()]))
				{
					$l = $data_lang[$v->pk()]->as_array();
					foreach ($l as $key => $value)
					{
						if ($key != $v->primary_key() && isset($v->$key))
						{
							$v->$key = $value;							
						}
					}
				}
				$new_data[$k] = $v;
			}
			$data = $new_data;
		}
		return $data;	
	}
}
?>