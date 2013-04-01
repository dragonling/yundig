<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Main Library.
 *
 * @package    Admin/Common
 * @category   Common
 * @author     Dragon
 */
class Common_Main{
	
	function __construct($model, $parent_id)
	{
		$this->_model_name = $model;
		$this->parent_id = $parent_id;	
	}
	
	public static function factory($model = NULL, $parent_id = NULL)
	{
		return new self($model, $parent_id);
	}
	/**
	 * 
	 * 获取下级数据
	 * @param Parent_id $id
	 */
	public function sub($id, $status = NULL, $args = array())
	{
		$orm = ORM::factory($this->_model_name);
		
		if ($status != NULL) $orm->where('status', '=', $status);
		foreach ($args as $v)
		{
			$orm->where($v['column'], $v['op'], $v['value']);
		}
				
		$data = $orm->select(array($this->_model_name.'.'.$orm->primary_key(), 'pk'))
					->where($this->parent_id, '=', $id)
					->order_by('sort_order','asc')
					->find_all()
					->as_array();
		if ( ! empty($data) && $orm->many_language === true) 
		{
		//	$data = $this->bind_language($this->_model_name, $data, Common::language_id());
		}
		return $data;
	}
	/**
	 * 
	 * 取得权限树原始数组
	 * @param Parent_id $id
	 * @param Status $status
	 */
	public function get_treeviews_data($parent_id = 0, $columns = array(), $status = NULL)
	{
		$cache_id = 'TREEVIEWS_DATA_'.strtoupper($this->_model_name).$parent_id.Common::language_id().md5(implode(',', $columns)).$status;
		$data = Cache::instance()->get($cache_id, array());
		//$data = array();
		if ( count($data) > 0 ) return $data;
		
		$items = $this->sub($parent_id, $status);		
		foreach ($items as $v)
		{
			$i = count($data);
			$v = $v->as_array();
			if (count($columns) > 0) 
			{
				$v = self::array_intersect_key($v, $columns);
				array_unique($v);
			}
			$data[$i] = $v; 
// 			print_r($v);
			$sub = $this->get_treeviews_data($v['pk'], $columns, $status);
			if ($sub !== FALSE)
			{
				$data[$i]['sub_items'] = $sub;
			}
			unset($sub);
		}
		
		Xcache::add_tag($cache_id, $data, 60*60*24*7, array('TREEVIEWS_DATA', 'DATA_'.strtoupper($this->_model_name)));
		return $data;
	}
	
	/**
	 * 为表单下拉框制造 Options
	 *
	 * @param array $data
	 * @param int $sub_number
	 * @return array
	 */
	public static function make_treeview_options($data = array(), $sub_number = 0, $key = 'pk', $column = 'name')
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
				$new_data[$arr[$key]] = $left_pad . '|-' . $arr[$column];
				
				if (isset($arr['sub_items']))
				{
					$arr3 = self::make_treeview_options($arr['sub_items'], $sub_number+1, $key, $column);
					$new_data += $arr3;
				}
			}
		}
		unset($data);
		return $new_data;
	}
	
	public function get_options($key = 'pk', $column = 'name', $parent = 0)
	{
		$data = $this->get_treeviews_data($parent);
		$data = self::make_treeview_options($data, 0, $key, $column);
	
		//如果不是超级管理员，则把超级管理员的权限删除
		if (Auth::instance()->get_user()->role_id != 1 && $this->_model_name == 'admin_roles')
		{
			unset($data[1]);
		}
		return $data;
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
		unset($data);
		
		return $new_data;
	}
	
	public static function array_intersect_key($array1, $array2)
	{
		$array = array();
		foreach ($array2 as $v)
		{
			isset($array1[$v]) ? $array[$v] = $array1[$v] : '';
		}
		unset($array1);
		unset($array2);
		
		return $array;
	}
	
	public static function bind_language($model_name, $data, $language_id = 0)
	{
		if ($language_id == 0) return $data;
		
		if (method_exists($data, 'pk'))
		{
			$orm = ORM::factory($model_name . '_language');					
			$data_lang = $orm->where($orm->foreign_key(), '=', $data->pk())
			           ->where('language_id', '=', $language_id)
					   ->find()
					   ->as_array();
			
			if ($data_lang[$orm->primary_key()] != '')
			{
				foreach ($data_lang as $key => $value)
				{
					if ($key != $orm->primary_key() && isset($data->$key))
					{
						$data->$key = $value;
					}
				}
			}
		}
		else
		{
			$pks = array();
			foreach ($data as $v)
			{
				$pks[] = $v->pk();
			}
			
			$orm = ORM::factory($model_name . '_language');
			$data_lang = $orm->where($orm->foreign_key(), 'in', $pks)
							 ->where('language_id', '=', $language_id)
							->find_all()
							->as_array($orm->foreign_key());
			$new_data = array();
			foreach ($data as $k => $v)
			{
				if (isset($data_lang[$v->pk()]))
				{
					$l = $data_lang[$v->pk()]->as_array();
					foreach ($l as $key => $value)
					{
						if ($key != $v->primary_key() && isset($v->$key))
						{
							$v->$key = $value;							
						}
					}
				}
				$new_data[$k] = $v;
			}
			$data = $new_data;
		}
		return $data;	
	}
	public static function languages()
	{
		$languages = ORM::factory('language')->where('status', '=', 1)->find_all()->as_array();

		return $languages;
	}
	public static function language_id()
	{
		$language_id = Arr::get($_GET, 'language_id', Cookie::get('sys_language_id'));
		return (int)$language_id;
	}
	public static function sys_language()
	{
		$id = (int)Cookie::get('sys_language_id');
		$name = Cookie::get('sys_language');

		return array($id, $name);
	}
	
	//子目录
	public static function realdir($dir = '')
	{	
		if ($dir == '' || ! file_exists($dir)) return array();	//不是存在的目录则返回空
		
		//如果dir最后一个字符是 / 则删除
		if (substr($dir, -1) == '\\' || substr($dir, -1) == '/')
		{
			$dir = substr($dir, 0, -1);
		}
		
		$files = scandir($dir);
		$dirs = array();
		foreach ($files as $k => $v)
		{
			if (is_dir($dir.'/'.$v) && $v != "." && $v != "..")
			{
				$dirs[$v] = $dir.'/'.$v;
			}
		}
		unset($files);
		return $dirs;
	}
}