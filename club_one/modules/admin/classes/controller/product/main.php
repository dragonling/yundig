<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_Product_Main extends Controller_Admin {

	public $category_id;
	
	function before()
	{		
		$this->_model_name = "product";		
		$this->category_id = $this->request->param('param');
		parent::before();
		$this->upload_path = Kohana::$base_url.'assets/uploads/products/';
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
		
		$columns = array('pk', 'id', 'sort_order', 'thumb', 'title', 'model', 'is_featured', 'is_new', 'status');
		$data = Common::array_intersect_key($data, $columns);
		$data['thumb']['func'] = "show_thumb";
		
		$data['sort_order']['attribute']  = "width=80";
		$data['thumb']['attribute']       = "width=100";
		$data['model']['attribute']       = "width=120";
		$data['is_featured']['attribute'] = "width=80";
		$data['is_new']['attribute']      = "width=80";
		return $data;
	}

	function action_list()
	{
		$this->page_rows = 10;
		$data = parent::action_list();
		$list = array();
		foreach($data as $k => $v)
		{
			$list[$k] = (object)$v;
			$list[$k]->is_featured = $this->toggle($list[$k], 'is_featured');
			$list[$k]->is_new      = $this->toggle($list[$k], 'is_new');
			$list[$k]->status      = $this->toggle($list[$k], 'status');
		}
		unset($data);
		return $this->template->data = $list;
	
	}	
	function action_select_list()
	{
		
		if (isset($_POST['act']) && $_POST['act'] == 'selected')
		{
			$catalog_id = Arr::get($_POST, 'catalog_id', 0);
			$id_list = Arr::get($_POST, 'id', array());
			foreach ($id_list as $aid)
			{
				$orm = ORM::factory('product_catalog')->where('catalog_id', '=', $catalog_id)->where('product_id', '=', $aid)->find();
				$orm->set('catalog_id', $catalog_id);
				$orm->set('product_id', $aid);
				$orm->save();
			}
			echo '<script>window.parent.originWindowReload()</script>';
			die();
			//$this->request->redirect(URL::site('admin/product/main/select_list').URL::query(array('catalog_id' => $catalog_id)));
		}
		
		$this->init();	
		
		$this->template = View::factory('product/select_list');
		
		$catalog_id = Arr::get($_GET, 'catalog_id', 0);
		$this->template->catalog_id =  $catalog_id;
		$this->template->self =  $this;
		
		//读取列信息
		$culumns = $this->list_columns($this->columns);
		unset($culumns['sort_order']);
		unset($culumns['status']);
		$this->template->columns = $culumns;
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		//数据信息
		$orm = ORM::factory($this->_model_name);
		$data = $orm->limit(1000)->find_all();
			
		if ( ! empty($data) && isset($this->model->many_language) && $orm->many_language === true)
		{
			$data = $this->bind_language($this->_model_name, $data, Common::language_id());
		}
		
		return $this->template->data = $data;
	
	}	
	function action_save()
	{
		$pid = parent::action_save();
		$language_id = $this->request->post('language_id');
		$contents    = $this->request->post('contents');
		$orm_contents  = ORM::factory('product_contents')->where('product_id', '=', $pid)->where('language_id', '=', $language_id)->find_all()->as_array('id');
		$contents_keys = array();
		$contents_keys = array_keys($orm_contents);
		unset($orm_contents);
		
		if ($contents != '')
		{
			foreach ($contents as $i => $v)
			{
				if (is_array($contents_keys) && in_array($v['id'], $contents_keys))
				{
					unset($contents_keys[array_search($v['id'], $contents_keys)]);
					$orm = ORM::factory('product_contents', $v['id']);
				}
				else
				{
					$orm = ORM::factory('product_contents');
				}
				
				$orm->product_id    = $pid;
				$orm->language_id = (int)$language_id;
				$orm->title       = $v['title'];
				$orm->content     = $this->request->post('contents_'.$i);
				$orm->save();
			}
			
			if ( ! empty($contents_keys))
			{
				DB::delete('product_contents')->where('id', 'in', $contents_keys)->execute();
			}
		}
		else
		{
			DB::delete('product_contents')->where('product_id', '=', $pid)->where('language_id', '=', $language_id)->execute();
		}
		return $pid;
	}
	/**
	 * 
	 * 新增
	 */
	function action_add()
	{
		$this->init();
		
		$this->template = View::factory('product/add');			
		
		//读取列信息 
		
		$columns = $this->blank_form_columns($this->columns);
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		unset($this->tabs['language']);
		
		$base_column = array('category_id', 'status', 'title', 'model', 'thumb', 'images', 'sort_order', 'is_featured', 'is_new', 'desc');
		$desc_column = array('content');
		$seo_column  = array('template', 'rewrite_url', 'seo_title', 'seo_keywords', 'seo_description');
		$other_column  = array('create_time', 'update_time', 'last_admin_user');
		$my_columns  = array();
		//系统设置 一般tag
		foreach (I18n::get('data_product_types', 'cms') as $k => $v)
		{
			$types[$k] = array(
					'id'       => '',
					'name'     => $k . '_column',  //根据name 选中显示内容
					'title'    => $v,
					'selected' => 'base' == $k ? 'selected' : '',
			);
			$colum = $k . '_column';
			foreach ($$colum as $col)
			{
				$my_columns[$k . '_column'][$col] = $columns[$col];
			}
		}
		//print_r($my_columns);die;
		$this->template->columns = $columns;
		$this->template->group_columns = $my_columns;
		$this->tabs['types_tabs'] = $types; //config_tabs 为大容器
	}
	/**
	 * 
	 * 编辑
	 */
	function action_edit()
	{
		//初始化 model配置 
		$this->init();
		$this->template = View::factory('product/add');	
		$primary_key = $this->request->param('id');
		
		if(empty($primary_key))
		Admin::error(I18n::get('err_input_param', 'common'));
		
		$orm = ORM::factory($this->_model_name, $primary_key);
		if ($orm->many_language == TRUE)
		{
			$orm = self::bind_language($this->_model_name, $orm, $this->language_id);
		}
      	//读取列信息 
		$columns = $this->full_form_columns($this->columns, $orm);
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;		
		
		
		$base_column = array('id', 'category_id', 'status', 'title', 'model', 'thumb', 'images', 'sort_order', 'is_featured', 'is_new', 'desc');
		$desc_column = array('content');
		$seo_column  = array('template', 'rewrite_url', 'seo_title', 'seo_keywords', 'seo_description');
		$other_column  = array('create_time', 'update_time', 'last_admin_user');
		$my_columns  = array();
		//系统设置 一般tag
		foreach (I18n::get('data_product_types', 'cms') as $k => $v)
		{
			$types[$k] = array(
					'id'       => '',
					'name'     => $k . '_column',  //根据name 选中显示内容
					'title'    => $v,
					'selected' => 'base' == $k ? 'selected' : '',
			);
			$colum = $k . '_column';
			foreach ($$colum as $col)
			{
				$my_columns[$k . '_column'][$col] = $columns[$col];
			}
		}
		//print_r($my_columns);die;
		$this->template->columns = $columns;
		$this->template->group_columns = $my_columns;
		$this->tabs['types_tabs'] = $types; //config_tabs 为大容器
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
		$data['content'] = array('name' => 'Content', 'field' => '', 'desc' => '', 'validate' => array('rules' => '{required: false}', 'message' => "''"));
		
		$category_options = Common::factory('product_category', 'parent_id')->get_options('pk', 'title');
		unset($category_options[0]);	//不要根节点
		
		$data['category_id']['field']  = Form::select("category_id", $category_options, $this->category_id);
		$data['thumb']['field']        = View::factory('widget/upload', array('field'=>'thumb', 'value'=>'', 'path' => $this->upload_path));
		$data['images']['field']       = View::factory('widget/album', array('field'=>'images', 'value'=>'', 'path' => $this->upload_path));
		$data['is_featured']['field']  = Form::select('is_featured', I18n::get('data_yes_no', 'common'), 0);
		$data['is_new']['field']       = Form::select('is_new', I18n::get('data_yes_no', 'common'), 0);
		$data['status']['field']       = Form::select('status', I18n::get('data_on_down', 'common'), 1);
		$data['desc']['field']         = Form::textarea('desc', '');
		
		$contents = array((object)array('id' => 0, 'title' => 'New', 'content' => ''));
		$data['content']['field']      = View::factory('cms/contents')->set('contents', $contents)->set('lang', 'en');
		
		$data['template']['validate']['rules']        = '{required: false}';	
		$data['rewrite_url']['validate']['rules']     = '{required: false}';	
		$data['seo_title']['validate']['rules']       = '{required: false}';	
		$data['seo_keywords']['validate']['rules']    = '{required: false}';		
		$data['seo_description']['validate']['rules'] = '{required: false}';
		$data['sort_order']['validate']['rules']      = '{required: false}';
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
		
		$category_options = Common::factory('product_category', 'parent_id')->get_options('pk', 'title');
		unset($category_options[0]);	//不要根节点

		$data['category_id']['field']  = Form::select("category_id", $category_options, $orm->category_id);
		$data['thumb']['field']        = View::factory('widget/upload', array('field' => 'thumb', 'value' => $orm->thumb, 'path' => $this->upload_path));
		$data['images']['field']	   = View::factory('widget/album', array('field'=>'images', 'value'=>$orm->images, 'path' => $this->upload_path));
		$data['is_featured']['field']  = Form::select('is_featured', I18n::get('data_yes_no', 'common'), $orm->is_featured);
		$data['is_new']['field']       = Form::select('is_new', I18n::get('data_yes_no', 'common'), $orm->is_new);
		$data['status']['field']       = Form::select('status', I18n::get('data_on_down', 'common'), $orm->status);
		$data['desc']['field']         = Form::textarea('desc', $orm->desc);
		
		$orm_contents = ORM::factory('product_contents')->where('product_id', '=', $orm->id)->where('language_id', '=', $this->language_id)->order_by('id', 'asc')->find_all();	
		$data['content']['field']      = View::factory('cms/contents')->set('contents', $orm_contents->as_array())->set('lang', 'en');
		return $data;
	}
}
?>