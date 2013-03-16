<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  Cache管理
 *
 * @package    Kohana/Admin/Cache
 * @category   Controllers
 * @author     DragonL
 */
class Controller_Cache_Main extends Controller_Admin{
	
	function before()
	{		
		$this->_model_name = "cache";
		
//		$this->info ="xxxxxxx";
//		$this->error = "aaaaaaaaaaa";
//		$this->warning = "";
//		$this->success = "";
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
		return parent::list_columns($data);	
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
		return parent::blank_form_columns($col,$return_id);		
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
		return parent::full_form_columns($col,$orm);
	}
	public static function handle($id, $row = NULL)
	{
		return '<a href="./flush/~/'.$id.'" target="_ajax">清空</a>';	
		
	}
	public function action_flush()
	{
		$id = $this->request->param('id');
		$orm = ORM::factory('cache')->where('id','=',$id)->find();		
		Xcache::delete_tag($orm->tag);
		echo $orm->tag.'更新成功';
	}
	
}
?>