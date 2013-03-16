<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_System_Language extends Controller_Admin{

	function before()
	{
		$this->_model_name = "language";
		parent::before();
		$this->upload_path = '/assets/uploads/';
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
		$data['status']['func'] = "toggle";
		$data['icon']['func']   = "flag_icon";
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
		
		$data['icon']['field']        = View::factory('widget/upload', array('field'=>'icon', 'value'=>'', 'path' => $this->upload_path));
		$data['status']['field']       = Form::select('status', I18n::get('data_status', 'common'), 1);
		
		
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
		
		$data['icon']['field']        = View::factory('widget/upload', array('field' => 'icon', 'value' => $orm->icon, 'path' => $this->upload_path));
		$data['status']['field']       = Form::select('status', I18n::get('data_status', 'common'), $orm->status);
		
		return $data;
	}
	
	public static function flag_icon($rom, $id)
	{
		return '<img src="'.$rom->icon.'" />';
	}
}
?>