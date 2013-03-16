<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Role Library.
 *
 * @package    Admin/Common
 * @category   Common
 * @author     Dragon
 */
class Common_Role{
	
	function __construct($model)
	{
		$this->model = $model;
		$this->parent_id = 'parent_id';	
	}
	
	public static function instance()
	{
		return new Common_Role('admin_roles');
	}
	
	public function get_options()
	{		
		$data = Common::factory($this->model, $this->parent_id)->get_treeviews_data(0);
		$data = Common::make_treeview_options($data);
		
		//如果不是超级管理员，则把超级管理员的权限删除
		if (Auth::instance()->get_user()->role_id != 1)
		{
			unset($data[1]);	
		}
		return $data;
	}
	public function get_role_by_id($id)
	{
		return ORM::factory($this->model, $id);
	}
	
}