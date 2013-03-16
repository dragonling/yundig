<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  Feeback....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_Cms_Feeback extends Controller_Admin {
	
	function before()
	{		
		$this->_model_name = "feeback";	
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
		
		$columns = array('pk', 'id', 'title', 'email', 'act_time',  'status');
		$data = Common::array_intersect_key($data, $columns);
		$data['status']['func'] = "feeback_status";
		$data['act_time']['func'] = "format_date";
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
		
		$data['content']['field'] = Form::textarea('content');
		$data['reply']['field']   = Form::textarea('reply');
		$data['status']['field']  = Form::select('status', I18n::get('data_status', 'common'), 1);
		
		$data['tel']['validate']['rules'] = '{required: false}';
		$data['qq']['validate']['rules'] = '{required: false}';
		$data['title']['validate']['rules'] = '{required: false}';
		$data['reply']['validate']['rules'] = '{required: false}';
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
		
		$data['content']['field'] = Form::textarea('content', $orm->content);
		$data['reply']['field']   = Form::textarea('reply', $orm->reply);
		$data['status']['field']  = Form::select('status', I18n::get('data_status', 'common'), $orm->status);
		
		return $data;
	}
	
	public static function feeback_status($orm, $name)
	{
		if (trim($orm->reply) == '')
		{
			return i18n::get('text_no_reply', 'cms');
		}
		else
		{
			return i18n::get('text_already_reply', 'cms');
		}
	}
	public static function format_date($orm, $name)
	{
		if ($orm->$name == 0) return '';
		return date('Y-m-d H:i:s', $orm->$name);
	}
}
?>