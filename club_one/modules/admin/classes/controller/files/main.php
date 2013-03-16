<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_Files_Main extends Controller_Admin {

	function before()
	{		
		$this->_model_name = "files";
		
		//$this->info ="";
		//$this->error = "";
		///$this->warning = "";
		//$this->success = "";
		parent::before();
		$this->upload_path = Kohana::$base_url.'assets/uploads/files/';
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
		$data['name']['func'] 	  = "file_link";
		return $data;
	}
	/**
	 * 重写修改应用列表显示方式
	 * @see Controller_Admin::action_list()
	 */
	function action_list()
	{
		$data = parent::action_list(); 
		$_data = array();
		foreach($data as $k=>$v)
		{
			$_data[$k] = $v;
		}
		$this->template->data = $_data;
	}
	
	function action_save()
	{	
		//初始化 model配置 
		$this->init();
		
		//获取 POST数据
		$data = $this->request->post();
		
		//因为需要兼容Add 与 Edit操作   为 Add操作默认pk为NULL
		$data[$this->pk] = isset($data[$this->pk]) ? $data[$this->pk] : NULL;
		
		$primary_key = $data[$this->pk];
		
		if(file_exists(DOCROOT.$this->upload_path . $data['name']))
		{
			$data['size'] = filesize(DOCROOT.$this->upload_path .$data['name']);			
		}
		
		$orm = ORM::factory($this->_model_name, $primary_key);
		//save
		foreach($this->columns as $k => $v)
		{
			$orm->$v = isset($data[$v]) ? $data[$v] : '';
		}		
		$orm->save();
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
		
		$data['name']['field'] = View::factory('widget/upload', array('field'=>'name', 'value'=>'', 'path' => $this->upload_path));
		$data['size']['field'] = Form::label("size", '');
				
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
		
		$data['name']['field'] = View::factory('widget/upload',array('field'=>'name', 'value' => $orm->name, 'path' => $this->upload_path));
		$data['size']['field'] = Form::label("size", $orm->size);
		
		return $data;
	}
	public static function file_link($row, $column)
	{
		$img_types = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
		//获得文件扩展名
		$temp_arr = explode(".", $row->name);
		$file_ext = array_pop($temp_arr);
		$file_ext = trim($file_ext);
		$file_ext = strtolower($file_ext);
		//检查扩展名
		if (in_array($file_ext, $img_types) === false)
		{
			$imgsrc = Kohana::$base_url.'assets/admin/images/file.png';
			$image = "<img src='{$imgsrc}' width=50 height=50 style='float:left;margin:2px 10px' />";
			$input = Form::input('imgsrc', $row->name, array('style' => 'float:left;margin-top:19px;width:250px;', 'onclick' => 'select()'));
			return "{$input} <a href='".URL::base('http').$row->name."' target='_blank'>{$image}</a>";
		}
		else
		{
			$imgsrc = $row->name;
			$image = "<img src='{$imgsrc}' width=50 height=50 style='float:left;margin:2px 10px' />";
			$input = Form::input('imgsrc', $row->name, array('style' => 'float:left;margin-top:19px;width:250px;', 'onclick' => 'select()'));
			return "{$input} <a href='".URL::base('http').$row->name."' target='_ajax'>{$image}</a>";
		}
	}
	
}
?>