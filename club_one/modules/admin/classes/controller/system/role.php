<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_System_Role extends Controller_Admin{
	
	function before()
	{
		$this->_model_name = "admin_roles";
		$this->_many_language = true;
		Arr::set_path($_POST, 'super_admin', $this->request->post('super_admin', 0));
		
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
		$columns = array('pk', 'id', 'sort_order', 'name', 'description', 'status');
		$data = Common::array_intersect_key($data, $columns);
		
		return $data;
	}
	
	function action_list()
	{
		$this->init();
		
		$this->template = View::factory('treeview');	
	
		$this->template->self =  $this;
		
		//读取列信息 
		$this->template->columns = $this->list_columns($this->columns);
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		$data = Common::factory($this->_model_name, 'parent_id')->get_treeviews_data(0, array('id', 'pk', 'parent_id', 'sort_order', 'name', 'description', 'status'));
		$list = Common::make_treeviews($data);
		unset($data);
		
		foreach($list as $k => $v)
		{
			$list[$k] = (object)$v;
			$list[$k]->status = $this->toggle($list[$k], 'status');
		}
		$this->template->data = $list;
		

	}
	
	/**
	 * 改写默认表单基本信息
	 * @example
	 parent::blank_form_columns($col,TRUE); //ID在添加时是否显示
	 $data['ext']['validate']['rules'] = '{}';
	 $data['ext']['validate']['message'] = '{}';
	  
	 // type 采用 Select 表单 数据来源于 type_options 方法
	 $data['type']['field'] = Form::select("type",$this->type_options(),1);
	
	 * @see Controller_Admin::blank_form_columns()
	 */
	protected function blank_form_columns($col,$return_id=FALSE)
	{
		$data = parent::blank_form_columns($col,$return_id);

		$label_rights = Form::label('rights_name', '',array('id' => 'rights_name'));
		$select_rights_url = URL::site('admin/system/rights/select_list');
		$get_names_url = URL::site('admin/system/rights/get_names');
		$rights_hidden     = Form::hidden('rights', '', array('id' => 'rights'));
		
		$data['parent_id']['field']  = Form::select("parent_id", Common_Role::instance()->get_options(), 0);
		$data['super_admin']['field']  = Form::checkbox("super_admin", 1);
		$data['rights']['field']	 = $label_rights . $rights_hidden . View::factory('widget/btn_append', array('onclick' => "selectRightsWindow('{$select_rights_url}', 'select_rights_url', '{$get_names_url}')"));
		$data['status']['field']     = Form::select('status', I18n::get('data_status', 'common'), 1);
		$data['sort_order']['field'] = Form::input('sort_order', 0, array('class'=>'half normal'));

		$data['super_admin']['validate']['rules'] = '{required: false}';
		$data['description']['validate']['rules'] = '{required: false}';
		$data['rights']['validate']['rules'] = '{required: false}';
		
		if ($this->role->super_admin == 0)
		{
			unset($data['super_admin']);
		}
		return $data;
	}
	
	/**
	 * 改写默认表单编辑信息 基本数据继承 blank_form_columns 与 list_columns
	 * @example
	 $data = parent::full_form_columns($col,$orm);
	 $data['type']['field'] = Form::select("type",$this->type_options(),$orm->type); //转换成Select并赋值
	  
	 * @see Controller_Admin::full_form_columns()
	 */
	protected function full_form_columns($col,$orm=NULL)
	{
		$data =  parent::full_form_columns($col,$orm);
		
		$rights_name = Controller_System_Rights::get_names($orm->rights);
		/*
		$orm_rights = ORM::factory('admin_rights')->select('name')->where('id', 'in', explode(',', ))->find_all();
		$rights_name = array();
		foreach ($orm_rights as $v)
		{
			$rights_name[] = $v->name;
		}
		*/
		$label_rights = Form::label('rights_name', implode(', ', $rights_name),array('id' => 'rights_name'));
		$select_rights_url = URL::site('admin/system/rights/select_list');
		$get_names_url = URL::site('admin/system/rights/get_names');
		$btn_select_rights = View::factory('widget/btn_append', array('onclick' => "selectRightsWindow('{$select_rights_url}', 'select_rights_url', '{$get_names_url}')"));	
		$rights_hidden     = Form::hidden('rights', $orm->rights, array('id' => 'rights'));
		$role_options = Common_Role::instance()->get_options();
		unset($role_options[$orm->pk()]);
		
		$data['parent_id']['field']  = Form::select("parent_id", $role_options, $orm->parent_id);
		$data['super_admin']['field']  = Form::checkbox("super_admin", 1, (bool)$orm->super_admin);
		$data['rights']['field']	 = $label_rights . $rights_hidden . $btn_select_rights;
		$data['status']['field']     = Form::select('status', I18n::get('data_status', 'common'), $orm->status);
		$data['sort_order']['field'] = Form::input('sort_order', $orm->sort_order, array('class'=>'half normal'));

		$data['super_admin']['validate']['rules'] = '{required: false}';
		$data['description']['validate']['rules'] = '{required: false}';
		$data['rights']['validate']['rules'] = '{required: false}';
		
		if ($this->role->super_admin == 0)
		{
			unset($data['super_admin']);
		}
		return $data;
	}
	
}