<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Right Library.
 *
 * @package    Admin/Common
 * @category   Common
 * @author     Dragon
 */
class Common_Right{
	
	function __construct($model, $parent_id)
	{
		$this->_model_name = $model;
		$this->parent_id = $parent_id;	
	}
	
	public static function factory($model = NULL, $parent_id = NULL)
	{
		return new Common_Right($model, $parent_id);
	}	
	/**
	 * 
	 * 获取下级数据
	 * @param Parent_id $id
	 */
	public function sub($id, $status = NULL)
	{
		$orm = ORM::factory($this->_model_name);
		if ($status != NULL) $orm->where('status', '=', $status);
		
		return $orm->where($this->parent_id, '=', $id)				
				   ->order_by('sort_order','asc')
				   ->find_all();
	}
	/**
	 * 
	 * 取得权限树原始数组
	 * @param Parent_id $id
	 * @param Status $status
	 */
	public function get_treeviews_data($parent_id = 0, $status = NULL)
	{
		$items = $this->sub($parent_id, $status);		
		$data = array();
		foreach ($items as $v)
		{
			$i = count($data);
			$data[$i] = array(
				'id'         => (string) $v->id,
				'parent_id'  => (string) $v->parent_id,
				'lang_id'    => (string) $v->lang_id,
				'name'       => (string) $v->name,
				'right'      => (string) $v->right,
				'type'       => (string) $v->type,
				'target'     => (string) $v->target,
				'sort_order' => (string) $v->sort_order,
				'status'     => (string) $v->status,
			);
			
			$sub = $this->get_treeviews_data($v->id, $status);
			if ($sub !== FALSE)
			{
				$data[$i]['sub_items'] = $sub;
			}
			unset($sub);
		}
		return $data;
	}
	
}