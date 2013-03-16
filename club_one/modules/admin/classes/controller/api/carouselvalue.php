<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  Carousel 示例
 *
 * @package    Kohana/Admin/Carousel
 * @category   Controllers
 * @author     Dragon
 */
class Controller_Api_Carouselvalue extends Controller_Admin{
	
	public $upload_path;
	
	function before()
	{		
		$this->_model_name = "api_carousel_value";
		parent::before();
		
		$this->upload_path = Kohana::$base_url.'assets/uploads/carousel/';
		$this->group_id = $this->request->param('param', 0);
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
		$data['image']['func'] = 'show_thumb';
		$data['thumb']['func'] = 'show_thumb';
		unset($data['group_id']);
		unset($data['desc']);
		return $data;
		
	}
	
	/**
	 *
	 * 列表顶部Filter表单HTML数据
	 */
	public static function filter() 
	{
	}
	
	function action_list()
	{
		$this->pagination = '';
		
		$page = Arr::get($_GET, 'page', 1);
		$orm = ORM::factory($this->_model_name)->where('group_id', '=', $this->group_id);
		$data = $orm->select(array($this->_model_name.'.'.$orm->primary_key(), 'pk'))->offset(($page-1)*$this->page_rows)->limit($this->page_rows)->find_all();
		
		if ( ! empty($data) && isset($this->model->many_language) && $orm->many_language === true)
		{
			$data = $this->bind_language($this->_model_name, $data, Common::language_id());
		}
		$this->customer_data = $data;
		parent::action_list();
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
	protected function blank_form_columns($col, $return_id=FALSE)
	{
		$data = parent::blank_form_columns($col,$return_id);
		$data['group_id']['field']  = Form::input('group_id', $this->group_id, array('readonly' => 'true'));
		$data['image']['field']     = View::factory('widget/upload', array('field' =>'image', 'value' => '', 'path' => $this->upload_path));
		$data['thumb']['field']     = View::factory('widget/upload', array('field' =>'thumb', 'value' => '', 'path' => $this->upload_path));
		$data['desc']['field']   = Form::textarea ("desc", '');
		$data['status']['field']    = Form::select ("status", I18n::get('data_status', 'common'), 1 );
		
		$data['thumb']['validate']['rules']       = '{required: false}';	
		$data['link']['validate']['rules']        = '{required: false}';	
		$data['title']['validate']['rules']       = '{required: false}';	
		$data['desc']['validate']['rules']        = '{required: false}';	
		$data['sort_order']['validate']['rules']  = '{required: false}';	
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
		$data = parent::full_form_columns($col, $orm);
		$data['group_id']['field']  = Form::input('group_id', $this->group_id, array('readonly' => 'true'));
		$data['image']['field']  = View::factory('widget/upload', array('field' =>'image', 'value' => $orm->image, 'path' => $this->upload_path));
		$data['thumb']['field']  = View::factory('widget/upload', array('field' =>'thumb', 'value' => $orm->thumb, 'path' => $this->upload_path));
		$data['desc']['field']   = Form::textarea ("desc", $orm->desc);
		$data['status']['field'] = Form::select ("status", I18n::get('data_status', 'common'), $orm->status );
		
		return $data;
	}
}
?>