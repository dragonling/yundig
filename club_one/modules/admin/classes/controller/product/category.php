<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_Product_Category extends Controller_Admin {

	function before()
	{		
		$this->_model_name = "product_category";
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
		$data =  parent::list_columns($data);
		
		$columns = array('pk', 'id', 'sort_order', 'title', 'rewrite_url', 'status');
		$data = Common::array_intersect_key($data, $columns);	
		$status = $data['status'];
		unset($data['status']);
		$data['status'] = $status;
		
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
		
		$data = Common::factory($this->_model_name, 'parent_id')->get_treeviews_data(0, array('id', 'pk', 'parent_id', 'sort_order', 'title', 'rewrite_url', 'status'));
		$list = Common::make_treeviews($data);
		
		unset($data);
		foreach($list as $k => $v)
		{
			$list[$k] = (object)$v;
			$list[$k]->status = $this->toggle($list[$k], 'status');
		}
		$this->template->data = $list;
	}
	
	function action_add()
	{
		$this->init();
		
		$this->template = View::factory('system/catalog_add');	
		
		//读取列信息 
		$columns = $this->blank_form_columns($this->columns);
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		$base_column = array('parent_id', 'title', 'image', 'target', 'desc', 'template', 'sort_order', 'status');
		$seo_column  = array('rewrite_url', 'seo_title', 'seo_keywords', 'seo_description');
		$my_columns  = array();
		//系统设置 一般tag
		foreach (I18n::get('data_catalog_types', 'catalog') as $k => $v)
		{
			$types[$k] = array(
					'id'       => '',
					'name'     => $k . '_column',  //根据name 选中显示内容
					'title'    => $v,
					'selected' => 'core' == $k ? 'selected' : '',
			);
			$colum = $k . '_column';
			foreach ($$colum as $col)
			{
				$my_columns[$k . '_column'][$col] = $columns[$col];
			}
		}
		$this->template->columns = $columns;
		$this->template->group_columns = $my_columns;
		$this->tabs['catalog_types_tabs'] = $types; //config_tabs 为大容器
		
		unset($this->tabs['language']);
	}
	
	/**
	 * 
	 * 编辑方法
	 */
	function action_edit()
	{
		//初始化 model配置 
		$this->init();
		$this->template = View::factory('system/catalog_add');	
		$primary_key = $this->request->param('id');
		
		if(empty($primary_key))
		Admin::error(I18n::get('err_input_param', 'common'));
		$orm = ORM::factory($this->_model_name, $primary_key);
		
		if ($orm->parent_id == 0 && Auth::instance()->get_role()->super_admin == 0)
		{
			$referrer = $this->request->referrer();
			$referrer .= (strpos($referrer, '?') === FALSE ? '?' : '&') . 'msg='.urlencode(I18n::get('msg_cannot_modify', 'common'));
			$this->request->redirect($referrer);
			return;
		}
		if (isset($orm->many_language) && $orm->many_language == TRUE)
		{
			$orm = self::bind_language($this->_model_name, $orm, $this->language_id);
		}
		
		//读取列信息 
		$columns = $this->full_form_columns($this->columns, $orm);
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		$base_column = array('id', 'parent_id', 'title', 'image', 'target', 'desc', 'template', 'sort_order', 'status');
		$seo_column  = array('rewrite_url', 'seo_title', 'seo_keywords', 'seo_description');
		$my_columns  = array();
		//系统设置 一般tag
		foreach (I18n::get('data_catalog_types', 'catalog') as $k => $v)
		{
			$types[$k] = array(
					'id'       => '',
					'name'     => $k . '_column',  //根据name 选中显示内容
					'title'    => $v,
					'selected' => 'core' == $k ? 'selected' : '',
			);
			$colum = $k . '_column';
			foreach ($$colum as $col)
			{
				$my_columns[$k . '_column'][$col] = $columns[$col];
			}
		}
		$this->template->columns = $columns;
		$this->template->group_columns = $my_columns;
		$this->tabs['catalog_types_tabs'] = $types; //config_tabs 为大容器
				
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
		$data['parent_id']['field']   = Form::select("parent_id", Common::factory($this->_model_name, 'parent_id')->get_options('pk', 'title'), 0);
		$data['target']['field']      = Form::select('target', I18n::get('data_target', 'common'), '_self');
		$data['desc']['field']        = Form::textarea('desc', '');
		$data['status']['field']      = Form::select('status', I18n::get('data_status', 'common'), 1);
		
		$data['image']['validate']['rules'] = '{required: false}';
		$data['desc']['validate']['rules'] = '{required: false}';
		$data['template']['validate']['rules'] = '{required: false}';
		$data['seo_title']['validate']['rules'] = '{required: false}';
		$data['rewrite_url']['validate']['rules'] = '{required: false}';
		$data['seo_keywords']['validate']['rules'] = '{required: false}';
		$data['seo_description']['validate']['rules'] = '{required: false}';
		$data['sort_order']['validate']['rules'] = '{required: false}';
		return 	$data;
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
		$data = parent::full_form_columns($col,$orm);
		$data['parent_id']['field']   = Form::select("parent_id", Common::factory($this->_model_name, 'parent_id')->get_options('pk', 'title'), $orm->parent_id);
		$data['target']['field']      = Form::select('target', I18n::get('data_target', 'common'), $orm->target);
		$data['desc']['field']        = Form::textarea('desc', $orm->desc);
		$data['status']['field']      = Form::select('status', I18n::get('data_status', 'common'), $orm->status);
		return $data;
	}
	
}
?>