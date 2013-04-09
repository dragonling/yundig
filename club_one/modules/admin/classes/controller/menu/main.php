<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  descriptions....
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Shunnar
 */
class Controller_Menu_Main extends Controller_Admin{
	
	function before()
	{
		$this->without_auth = TRUE;
		$this->model_name = "admin_rights";
		parent::before();
	}
	function action_sub()
	{
		$parent_id = Arr::get($_GET, 'parent_id', 0);
		
		$right = ORM::factory($this->model_name, $parent_id)->as_array();
		
		$menu = Common::factory($this->model_name, 'parent_id')->sub($parent_id, 1);
		
		$data = array();
		if (Auth::instance()->get_role()->super_admin == 1)
		{
			foreach ($menu as $v)
			{
				if ($v->type == 1)
				{
					$data[$v->id]['name'] = $v->name;
					$sub_items = Common::factory($this->model_name, 'parent_id')->sub($v->id, 1);
					
					$sub_items = Common::bind_language($this->model_name, $sub_items, $this->sys_language_id);
					foreach ($sub_items as $sub)
					{
						$data[$v->id]['list'][] = array(
							'current' => false,
							'title'   => $sub->name,
							'link'	  => ($sub->catalog_id > 0 ? URL::site($sub->right.'/'.$sub->catalog_id) : URL::site($sub->right)),
							'id'	  => $sub->id,
							'target'  => $sub->target
							);
					}
					//print_r($v->as_array());die;
					/*如果绑定了目录，则load目录结构作为菜单*/
					if ($v->catalog_id > 0)
					{
						$menu = Common::factory('catalog', 'parent_id')->sub($v->catalog_id, 1);
						$menu = $this->catalog_menu($menu, $v->right, TRUE);
						$data[$v->id]['list'] = $menu;
						//die(json_encode($menu));
					}
				}
			}
		}
		elseif ($this->role)
		{
			$auth_roles = explode(',',	$this->role->rights);
			$auth_roles = array_flip($auth_roles);
			
			foreach ($menu as $k => $v)
			{
				if (isset($auth_roles[$v->id]))
				{
					if ($v->type == 1)
					{
						$data[$v->id]['name'] = $v->name;
						$sub_items = Common::factory($this->model_name, 'parent_id')->sub($v->id, 1);
						$sub_items = Common::bind_language($this->model_name, $sub_items, $this->sys_language_id);
						foreach ($sub_items as $sub)
						{
							if (isset($auth_roles[$sub->id]))
							{
								
								//$sub = Controller_Admin::bind_language($this->model_name, $sub, $this->sys_language_id);
								$data[$v->id]['list'][] = array(
									'current' => false,
									'title'   => $sub->name,
									'link'	  => ($sub->catalog_id > 0 ? URL::site($sub->right.'/'.$sub->catalog_id) : URL::site($sub->right)),
									'id'	  => $sub->id,
									'target'  => $sub->target
									);
							}
						}
					}
					
					/*如果绑定了目录，则load目录结构作为菜单*/
					if ($v->catalog_id > 0)
					{
						$menu = Common::factory('catalog', 'parent_id')->sub($v->catalog_id, 1);
						$menu = $this->catalog_menu($menu, $v->right, TRUE);
						$data[$v->id]['list'] = $menu;
						//die(json_encode($menu));
					}
				}
			}
		}
		//print_r($data);die;
		/*如果绑定了目录，则load目录结构作为菜单*/
		if ( ! empty($right) AND $right['catalog_id'] > 0)
		{
			$menu = Common::factory('catalog', 'parent_id')->sub($right['catalog_id'], 1);
			$menu = $this->catalog_menu($menu, $right);
			$data = array_merge($data, $menu);
			//die(json_encode($menu));
		}
		
		$data = array_values($data);
		
		die(json_encode($data));
	}
	
	function catalog_menu($list = array(), $right = array(), $end_menu = FALSE)
	{
		$data = array();
		
		if ($end_menu === TRUE)
		{
			foreach ($list as $sub)
			{
				$data[] = array(
					'current' => false,
					'title'   => $sub->title,
					'link'	  => URL::site($right.'/'.$sub->id),
					'id'	  => 'cat'.$sub->id,
					'target'  => ''
					);
			}
		}
		else
		{
			foreach ($list as $v)
			{
				$data['cat'.$v->id]['name'] = $v->title;
				$sub_items = Common::factory('catalog', 'parent_id')->sub($v->id, 1);
				
				$sub_items = Common::bind_language('catalog', $sub_items, $this->sys_language_id);
				foreach ($sub_items as $sub)
				{
					$data['cat'.$v->id]['list'][] = array(
						'current' => false,
						'title'   => $sub->title,
						'link'	  => URL::site($right['right'].'/'.$sub->id),
						'id'	  => $sub->id,
						'target'  => ''
						);
				}
			}
		}
		return $data;
	}
	/**
	 * 自定义显示列信息
	 * @see Controller_Admin::columns()
	 * @example
 	    $data =  parent::columns($data);
		$data['tid']['func'] = "md5";
		$data['tid']['name'] = "字段中文";
		return $cols;
	 */
	function list_columns($data)
	{
		$data =  parent::list_columns($data);		
		
		$data['parent_id']['func'] = "menu_name";	
		$data['link']['func'] = "limitstr";	

		return $data;
	}
	protected function full_form_columns($col,$orm=NULL)
	{
		$data = parent::full_form_columns($col,$orm);		
		$data['parent_id']['field'] = Form::select("parent_id",$this->menu_options(),$orm->parent_id);
		$data['target']['field'] = Form::select("target",$this->target_options(),$orm->target);
		return $data;
	}
	protected function blank_form_columns($col,$return_id=FALSE)
	{
		$data = parent::blank_form_columns($col,$return_id);
		$data['parent_id']['field'] = Form::select("parent_id",$this->menu_options());
		$data['target']['field'] = Form::select("target",$this->target_options());
		return $data;
	}
	/**
	 * 
	 * 获取表单下拉列表数据
	 */
	private function menu_options()
	{
		
		$options =  DB::select('id', 'title')->from('admin_menu')->execute()->as_array("id","title");
		$options[0] = "Root";
		ksort($options); 
		return $options;
		
	}
	public static function menu_name($id)
	{
		if($id===NULL)
		return NULL;
		$menu =  ORM::factory("menu",$id);
		$title = $menu->title?$menu->title:"-";
		return $title;		 
	}
	public function target_options()
	{
		return  I18n::get('data_target', 'common');
	}
	/**
	 * 
	 * 限制显示字符
	 * @param unknown_type $text
	 */
	public static function limitstr($text)
	{
		return Text::limit_chars($text,30);
	}
	
}
?>