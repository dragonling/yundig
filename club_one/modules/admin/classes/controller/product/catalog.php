<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_Product_Catalog extends Controller_Admin {
	
	function before()
	{		
		$this->_model_name = "product_catalog";
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
		
		$this->template = View::factory('system/product_list');	
	
		$catalog_id = $this->request->param('param');
		$this->template->catalog_id =  $catalog_id;
		$this->template->self =  $this;
		
		//读取列信息 
		$columns['id'] = array('name' => 'ID', 'func' => 'strval', 'desc' => '');
		$columns['sort_order'] = array('name' => '排序', 'func' => 'strval', 'desc' => '');
		$columns['title'] = array('name' => '标题', 'func' => 'strval', 'desc' => '');
		$this->template->columns = $columns;
		
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;
		
		$product_table = Database::instance()->table_prefix().'product';
		$product_catalog_table = Database::instance()->table_prefix().'product_catalog';
		//$list = ORM::factory('product')->select(DB::expr(Database::instance()->table_prefix().'product_catalog.sort_order as sort_order'))->join('product_catalog', 'left')->on('product_catalog.product_id', '=', 'product.id')->where('product_catalog.catalog_id', '=', $catalog_id)->find_all()->as_array();
		$query = DB::query(1, "SELECT product.*, product_catalog.sort_order, product_catalog.id "
							 ."FROM {$product_table} as product LEFT JOIN {$product_catalog_table} as product_catalog ON product_catalog.product_id = product.id "
							 ."WHERE product_catalog.catalog_id = {$catalog_id}");
		$list = $query->execute()->as_array();
		
		foreach($list as $k => $v)
		{
			$list[$k] = (object)$v;
		}
		$this->template->data = $list;
	
	}	
	
	/**
	 * 
	 * 编辑
	 */
	function action_edit()
	{
		//初始化 model配置 
		$this->init();
		$this->template = View::factory('add');	
		$catalog_id  = $this->request->param('param');
		$primary_key = $this->request->param('id');
		
		if(empty($primary_key))
		Admin::error(I18n::get('err_input_param', 'common'));
		$orm = ORM::factory($this->_model_name, $primary_key);
		
      	//读取列信息 
		$this->template->columns = $this->full_form_columns($this->columns, $orm);
		//获取主键名称 用于编辑删除操作
		$this->template->pk = $this->pk;		
				
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
		
		unset($data['product_id']);
		unset($data['catalog_id']);

		return $data;
	}
	/**
	 * 
	 * 列表静态操作方法
	 * @param primary_key $id
	 */
	public static function handle($id)
	{
		$request = new Request($_SERVER['REQUEST_URI']);
		
		$param = '~/';
		if ($request->param('param') != '') $param = $request->param('param').'/'; 
		$edit = URL::site('admin/'.$request->directory().'/'.$request->controller().'/edit/'.$param.$id);
		$del  = URL::site('admin/'.$request->directory().'/'.$request->controller().'/del/'.$param.$id);
		$anchor = '<a href="'.$edit.'">'.HTML::image('assets/admin/images/icon_edit.gif', array('title' => I18n::get('alt_edit', 'common'))).'</a> ';
		$anchor.= '<a onclick="return confirm(\''.I18n::get('alt_comfirn_delete', 'common').'\', {call:function() { window.location = \''.$del.'\' } })" href="javascript:;">'.HTML::image('assets/admin/images/icon_del.gif', array('title' => I18n::get('alt_delete', 'common'))).'</a>';
		return $anchor;
	}
}
?>