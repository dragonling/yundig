<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  Demo 示例
 *
 * @package    Kohana/Admin/Demo
 * @category   Controllers
 * @author     Shunnar
 */
class Controller_Api_Ad extends Controller_Admin{
	
	function before()
	{		
		$this->_model_name = "api_ad";
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
		$data['position_id']['func'] = "position_name";
		unset($data['content']);
		return $data;	
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
		$data['position_id']['field'] = Form::select("position_id",$this->ad_options());
		$data['type']['field'] = Form::select("type",$this->type_options());
		$data['image']['field'] = View::factory('widget/upload', array('field' => 'image', 'value' => '', 'path' => '/assets/uploads'));
		$data['content']['field'] = Form::textarea("content","",array('class' => 'medium half'));
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
		$data = parent::full_form_columns($col,$orm);
		$data['position_id']['field'] = Form::select("position_id",$this->ad_options(),$orm->position_id);
		$data['type']['field'] = Form::select("type",$this->type_options(),$orm->type);
		$data['image']['field'] = View::factory('widget/upload', array('field' => 'image', 'value'=>$orm->image, 'path' => '/assets/uploads'));
		$data['content']['field'] = Form::textarea("content",$orm->content,array('class' => 'medium half'));
		return $data;
	}
	/**
	 * 
	 * 广告位置信息
	 */
	private function ad_options()
	{
		
		$options =  DB::select('id', 'title')->from('api_ad_position')->execute()->as_array("id","title");
		//$options[0] = "顶级菜单";
		ksort($options); 
		return $options;
		
	}
	
	public static function position_name($orm, $id)
	{
		if($orm->position_id == '') return NULL;
		
		$ad =  ORM::factory("api_position", $orm->position_id);
		$title = $ad->title ? $ad->title : '-';
		return $title;		 
	}
	
	private static function type_options()
	{
		return array(
			"text"=>'文字',
			"image"=>'图片',
			"html"=>'HTML代码',
		
		);
	}
	
	
	
	
}
?>