<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Menu Library.
 *
 * @package    Admin/Common
 * @category   Common
 * @author     Shunnar
 */
class Common_Menu{
	
	function __construct($model, $parent_id)
	{
		$this->_model_name = $model;
		$this->parent_id = $parent_id;	
	}
	
	public static function factory($model = NULL, $parent_id = NULL)
	{
		return new Common_Menu($model, $parent_id);
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
		$orm = $orm->where($this->parent_id, '=', $id)				
				   ->order_by('sort_order','asc')
				   ->find_all();
		return $orm;
	}
	//取得权限树原始数组
	public function get_tree_view($parent_id = 0, $status = NULL)
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
			
			$sub = $this->get_tree_view($v->id, $status);
			if ($sub !== FALSE)
			{
				$data[$i]['sub_items'] = $sub;
			}
			unset($sub);
		}
		return $data;
	}
	
	/**
	 * 
	 * Test Iterator
	 * @param unknown_type $id
	 */
	function iterate($id=0)
	{
		
		$pid = $this->parent_id;
		$data =  $this->sub($id);
		foreach($data as $k=>$v)
		{
			$res[$k]['id'] = $v->id;
			$res[$k]['title'] = $v->title;
			if($this->sub($v->id)->count()>0)
			$res[$k]['sub'] = $this->iterate($v->id);	
		}
		return $res;
	}
	/**
	 * 
	 * 为菜单返回HTML代码
	 * @param pid $id
	 */
	function menu_html($id=0)
	{
		$html = "";
		$pid = $this->parent_id;
		$data =  $this->sub($id);
		foreach($data as $k=>$v)
		{
			$html .="<li>"; 
			$html .="<a href='".URL::site($v->link)."' target='".$v->target."'>".$v->title."</a>"; 
			
			if($this->sub($v->id)->count()>0)
			$html.= "<ul>".$this->menu_html($v->id)."</ul>";
			$html .="</li>"; 	
		}
		return $html;
	}
	
	// 制造树状数组 index() 引用
	public static function make_tree_view($data = NULL, $sub_number = 0)
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
					$arr3 = self::make_tree_view($arr['sub_items'], $sub_number+1);
					$new_data = array_merge($new_data, $arr3);
				}
			}
		}
		return $new_data;
	}
	
}