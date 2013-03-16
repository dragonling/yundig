<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_Cms_Main extends Controller_Admin {

	public $category_id;
	
	function before()
	{		
		$this->_model_name = "article";		
		$this->category_id = $this->request->param('param');
		$this->page = Arr::get($_GET, 'page', 1);
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
		
		$columns = array('pk', 'id', 'sort_order', 'title', 'status');
		$data = Common::array_intersect_key($data, $columns);		
		return $data;
	}

	function action_list()
	{
		$this->init();	
		
		$this->template = View::factory('list');
		
		$this->template->self =  $this;
		
		//读取列信息
		$this->template->columns = $this->list_columns($this->columns);
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		//数据信息
		$orm = ORM::factory($this->_model_name);
		$total_rows = ORM::factory($this->_model_name);
		if ( ! empty($this->category_id) && is_numeric($this->category_id) )
		{
			$cats = Common::factory('catalog', 'parent_id')->get_options('pk', 'title', $this->category_id);
			$cat_ids = array_keys($cats);
			$cat_ids[] = $this->category_id;
			$orm->where('category_id', 'in', $cat_ids);
			$total_rows->where('category_id', 'in', $cat_ids);
		}
		$data = $orm->offset(($this->page-1)*$this->page_rows)->limit($this->page_rows)->find_all()->as_array();
			
		if ( ! empty($data) && isset($this->model->many_language) && $orm->many_language === true)
		{
			$data = $this->bind_language($this->_model_name, $data, Common::language_id());
		}
		
		foreach($data as $k => $v)
		{
			$data[$k] = (object)$v;			
			$data[$k]->status = $this->toggle($data[$k], 'status');
		}
		//分页
		$pagination = new Pagination(array(
			'total_items' => $total_rows->count_all(), 
			'items_per_page' => $this->page_rows,  // set this to 30 or 15 for the real thing, now just for testing purposes...
		));
		
		$this->template->pagination = $pagination->render();
		
		//分类标签
		/*
		$tabs = array();
		$category  = ORM::factory('catalog')->where('parent_id', '=', 1)->where('status', '=', 1)->order_by('sort_order')->find_all()->as_array('id', 'title');
		foreach ($category as $k => $v)
		{
			$tabs[$k] = array(
					'id'       => $k,
					'name'     => 'category_' . $v,
					'title'    => $v,
					'selected' => $this->category_id == $k ? 'selected' : '',
					'link'     => URL::site('admin/cms/main/list/'.$k).URL::query(),
			);
		}		
		$default = array(
				'id'       => 0,
				'name'     => 'category_0',
				'title'    => I18n::get('All', 'common'),
				'selected' => $this->category_id == 0 ? 'selected' : '',
				'link'     => URL::site('admin/cms/main/list/0').URL::query(),
				);		
		array_unshift($tabs, $default);
		$this->tabs['category_tabs'] = $tabs;
		*/
		return $this->template->data = $data;
	
	}	
	function action_select_list()
	{
		
		if (isset($_POST['act']) && $_POST['act'] == 'selected')
		{
			$catalog_id = Arr::get($_POST, 'catalog_id', 0);
			$id_list = Arr::get($_POST, 'id', array());
			foreach ($id_list as $aid)
			{
				$orm = ORM::factory('article_catalog')->where('catalog_id', '=', $catalog_id)->where('article_id', '=', $aid)->find();
				$orm->set('catalog_id', $catalog_id);
				$orm->set('article_id', $aid);
				$orm->save();
			}
			echo '<script>window.parent.originWindowReload()</script>';
			die();
			//$this->request->redirect(URL::site('admin/cms/main/select_list').URL::query(array('catalog_id' => $catalog_id)));
		}
		
		$this->init();	
		
		$this->template = View::factory('cms/select_list');
		
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
		$total_rows = ORM::factory($this->_model_name);
		if ( ! empty($this->category_id) && is_numeric($this->category_id) )
		{
			$cats = Common::factory('catalog', 'parent_id')->get_options('pk', 'title', $this->category_id);
			$cat_ids = array_keys($cats);
			$cat_ids[] = $this->category_id;
			$orm->where('category_id', 'in', $cat_ids);
			$total_rows->where('category_id', 'in', $cat_ids);	
		}
		
		$data = $orm->offset(($this->page-1)*$this->page_rows)->limit($this->page_rows)->find_all();
			
		if ( ! empty($data) && isset($this->model->many_language) && $orm->many_language === true)
		{
			$data = $this->bind_language($this->_model_name, $data, Common::language_id());
		}
		
		//分页
		$pagination = new Pagination(array(
			'total_items' => $total_rows->count_all(), 
			'items_per_page' => $this->page_rows,  // set this to 30 or 15 for the real thing, now just for testing purposes...
		));
		
		$this->template->pagination = $pagination->render();
		
		//分类tab
		$tabs = array();
		$category  = ORM::factory('catalog')->where('parent_id', '=', 1)->where('status', '=', 1)->order_by('sort_order')->find_all()->as_array('id', 'title');
		foreach ($category as $k => $v)
		{
			$tabs[$k] = array(
					'id'       => $k,
					'name'     => 'category_' . $v,
					'title'    => $v,
					'selected' => $this->category_id == $k ? 'selected' : '',
					'link'     => URL::site('admin/cms/main/select_list/'.$k).URL::query(),
			);
		}		
		$default = array(
				'id'       => 0,
				'name'     => 'category_0',
				'title'    => I18n::get('All', 'common'),
				'selected' => $this->category_id == 0 ? 'selected' : '',
				'link'     => URL::site('admin/cms/main/select_list/0').URL::query(),
				);		
		array_unshift($tabs, $default);
		$this->tabs['category_tabs'] = $tabs;
		
		return $this->template->data = $data;
	
	}	
	function action_save()
	{
		$this->request->post('post_time', strtotime($this->request->post('post_time')));
		$aid = parent::action_save();
		$language_id = $this->request->post('language_id');
		$contents    = $this->request->post('contents');
		$orm_contents  = ORM::factory('article_contents')->where('article_id', '=', $aid)->where('language_id', '=', $language_id)->find_all()->as_array('id');
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
					$orm = ORM::factory('article_contents', $v['id']);
				}
				else
				{
					$orm = ORM::factory('article_contents');
				}
				
				$orm->article_id    = $aid;
				$orm->language_id = (int)$language_id;
				$orm->title       = $v['title'];
				$orm->content     = $this->request->post('contents_'.$i);
				$orm->save();
			}
			
			if ( ! empty($contents_keys))
			{
				DB::delete('article_contents')->where('id', 'in', $contents_keys)->execute();
			}
		}
		else
		{
			DB::delete('article_contents')->where('article_id', '=', $aid)->where('language_id', '=', $language_id)->execute();
		}
		
		// 关联该文章ID到catalog
		if ($this->request->post('category_id') > 0)
		{
			$catalog_id = $this->request->post('category_id');
			$orm = ORM::factory('article_catalog')->where('catalog_id', '=', $catalog_id)->where('article_id', '=', $aid)->find();
			$orm->set('catalog_id', $catalog_id);
			$orm->set('article_id', $aid);
			$orm->save();
		}
		return $aid;
	}
	/**
	 * 
	 * 新增
	 */
	function action_add()
	{
		$this->init();
		
		$this->template = View::factory('cms/add');	
		
		//读取列信息 
		$columns = $this->blank_form_columns($this->columns);
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		$this->template->contents = array((object)array('id' => 0, 'title' => 'New', 'content' => ''));
		unset($this->tabs['language']);
		
		$base_column = array('category_id', 'title', 'thumb', 'images', 'post_time', 'sort_order', 'status', 'template');
		$seo_column  = array('rewrite_url', 'seo_title', 'seo_keywords', 'seo_description');
		$my_columns  = array();
		//系统设置 一般tag
		foreach (I18n::get('data_article_types', 'cms') as $k => $v)
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
		$this->template = View::factory('cms/add');	
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
		
		$orm_contents = ORM::factory('article_contents')->where('article_id', '=', $primary_key)->where('language_id', '=', $this->language_id)->order_by('id', 'asc')->find_all();
		$this->template->contents = $orm_contents->as_array();
		
		$base_column = array('id', 'category_id', 'title', 'thumb', 'images', 'post_time', 'sort_order', 'status', 'template');
		$seo_column  = array('rewrite_url', 'seo_title', 'seo_keywords', 'seo_description');
		$my_columns  = array();
		//系统设置 一般tag
		foreach (I18n::get('data_article_types', 'cms') as $k => $v)
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
		
		$category_options = Common::factory('catalog', 'parent_id')->get_options('pk', 'title');
		
		$data['category_id']['field']  = Form::select("category_id", $category_options, $this->category_id);
		$data['post_time']['field'] = Form::input('post_time', date('Y-m-d H:i:s'), array('id'=>'_post_time','class'=>'half normal'));
		$data['status']['field'] = Form::select('status', I18n::get('data_status', 'common'), 1);
		$data['thumb']['field']  = View::factory('widget/upload', array('field'=>'thumb', 'value'=>'', 'path' => '/assets/uploads/article'));
		$data['images']['field'] = View::factory('widget/album', array('field'=>'images', 'value'=>'', 'path' => '/assets/uploads/article'));
		
		$data['thumb']['validate']['rules'] = '{required: false}';	
		$data['template']['validate']['rules'] = '{required: false}';	
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
		
		$category_options = Common::factory('catalog', 'parent_id')->get_options('pk', 'title');

		$data['category_id']['field']  = Form::select("category_id", $category_options, $orm->category_id);
		$data['post_time']['field'] = Form::input('post_time', date('Y-m-d H:i:s', $orm->post_time), array('id'=>'_post_time','class'=>'half normal'));
		$data['status']['field']  = Form::select('status', I18n::get('data_status', 'common'), $orm->status);
		$data['thumb']['field']   = View::factory('widget/upload', array('field'=>'thumb', 'value'=>$orm->thumb, 'path' => '/assets/uploads/article'));
		$data['images']['field']  = View::factory('widget/album', array('field'=>'images', 'value'=>$orm->images, 'path' => '/assets/uploads/article'));
		return $data;
	}
}
?>