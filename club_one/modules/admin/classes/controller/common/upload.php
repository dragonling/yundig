<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  Demo 示例
 *
 * @package    Kohana/Admin/Demo
 * @category   Controllers
 * @author     Shunnar
 */
class Controller_Common_Upload extends Controller_Admin{
	
	function before()
	{
		$this->without_auth = TRUE;
		parent::before();

		//设定系统语言
		list($this->sys_language_id, $this->sys_language) = Common::sys_language();
		I18n::$source = ($this->sys_language == '' ? 'zh/cn/' : $this->sys_language);
	}
	/**
	 * 
	 *通用上传方法 tip由于使用Flash上传，获取不到Cookie权限处理比较复杂，日后增加
	 */
	function action_index()
	{
		$upload_path = Arr::get($_POST, 'upload_path', '');
		
		//如果没有自定义路径，则用系统保留上路径
		if ($upload_path == '')
		{
			$upload_path = UPLOADPATH . '/' . date('Ym') . '/';
		}
		else
		{
			$upload_path .= '/' . date('Ym') . '/';
		}
		
		$save_path = DOCROOT . $upload_path;		
		$save_path = str_ireplace('\\', '/', $save_path);
		$save_path = str_ireplace("//", '/', $save_path);
		if(!file_exists($save_path))
		{
			mkdir($save_path, 0777, TRUE);
		}
		
		$file_name = md5_file($_FILES["resume_file"]["tmp_name"]);
		$ext = strtolower(substr(strrchr($_FILES["resume_file"]["name"], '.'), 1));     
		
		$save_path .= $file_name . '.' . $ext;
		$upload_path .= '/' . $file_name . '.' . $ext;
		$upload_path  = str_replace('//', '/', $upload_path);
		
		if (move_uploaded_file($_FILES["resume_file"]["tmp_name"], $save_path ))
		{
			echo $upload_path;
		} 	
	}
}
?>