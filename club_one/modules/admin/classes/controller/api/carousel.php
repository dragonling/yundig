<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  Carousel 示例
 *
 * @package    Kohana/Admin/Carousel
 * @category   Controllers
 * @author     Dragon
 */
class Controller_Api_Carousel extends Controller_Admin{
	
	function before()
	{		
		$this->_model_name = "api_carousel";
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
		$data['status']['func'] = 'toggle';
		return $data;
		
	}
	
	/**
	 *
	 * 列表顶部Filter表单HTML数据
	 */
	public static function filter() {
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
		$data['status']['field'] = Form::select ("status", I18n::get('data_status', 'common'), 1 );
		
		
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
		$data['status']['field'] = Form::select ("status", I18n::get('data_status', 'common'), $orm->status );
		
		return $data;
	}
	/**
	 *
	 * 列表静态操作方法
	 * @param primary_key $id
	 */
	public static function handle($id, $row = NULL)
	{
		$html  = '<a href="'.URL::site('admin/api/carouselvalue/list/'.$id.'?group_id='.$id).'" target="_iframe">上传图片</a> ';
		$html .= parent::handle($id);
	//	$anchor .= '<a href="./edit/~/'.$id.'">编辑</a> ';
		return $html;
	}
}
?>