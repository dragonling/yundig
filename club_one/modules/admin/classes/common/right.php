<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Menu Library.
 *
 * @package    Admin/Common
 * @category   Common
 * @author     Shunnar
 */
class Common_Right{
	
	function __construct($model, $parent_id)
	{
		$this->model = $model;
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
		$orm = ORM::factory($this->model);
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
	
	/**
	 * 为表单下拉框制造 Options
	 *
	 * @param array $data
	 * @param int $sub_number
	 * @return array
	 */
	public static function make_treeview_options($data = array(), $sub_number = 0)
	{
		$new_data = array(0 => I18n::get('text_root', 'common'));
		if ($data)
		{
			$count_data = count($data);
			foreach($data as $i => $arr)
			{				
				$arr['sub_number'] = $sub_number;
				$left_pad = str_pad('', $sub_number*4);
				$left_pad = str_replace(' ', "&nbsp;", $left_pad);
				$new_data[$arr['id']] = $left_pad . '|-' . $arr['name'];
				
				if (isset($arr['sub_items']))
				{
					$arr3 = self::make_treeview_options($arr['sub_items'], $sub_number+1);
					$new_data += $arr3;
				}
			}
		}
		return $new_data;
	}
	
	/**
	 * 为权限集列表制造适合的数组
	 *
	 * @param array $data
	 * @param array $sub_number
	 * @return array
	 */
	public static function make_treeviews($data = NULL, $sub_number = 0)
	{
		$new_data = array();
		if ($data)
		{
			$count_data = count($data);
			foreach($data as $i => $arr)
			{
				if (empty($arr['sub_items']))
				{
					$arr['list'] = 'single';
				}
				elseif (count($arr['sub_items']) > 0)
				{
					$arr['list'] = 'more';
				}
				elseif ($i+1 == $count_data)
				{
					$arr['list'] = 'end';
				}
				else
				{
					$arr['list'] = 'list';
				}
				
				$arr['sub_number'] = $sub_number;
				$arr2 = $arr;
				unset($arr2['sub_items']);
				$new_data[] = $arr2;
				
				if (isset($arr['sub_items']))
				{
					$arr3 = self::make_treeviews($arr['sub_items'], $sub_number+1);
					$new_data = array_merge($new_data, $arr3);
				}
			}
		}
		return $new_data;
	}
	
}