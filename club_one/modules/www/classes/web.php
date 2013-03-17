<?php defined('SYSPATH') or die('No direct script access.');

class Web extends Controller{
	
	protected  $model;
	protected  $_model_name;
	protected  $customer_data = NULL;
	
	/**
	 * @var  View  page template
	 */
	public $template ;
	public $info;
	public $error;
	public $warning;
	public $success;
	
	public $language_id = NULL;
	public $module = 'www';
	
	function before()
	{
		$this->set_config();
	}
	
	protected function set_config()
	{
		$lang = ORM::factory('language', Common_Main::language_id());
		if ($lang->loaded())
		{
			I18n::$source = $lang->pack_name;
		}
		else
		{
			I18n::$source = I18n::$source;
		}

		$orm = ORM::factory('config')->where('module', '=', $this->module)->where('language_id', '=', Common_Main::language_id())->find_all()->as_array();
		if ( ! $orm)
		{
			$orm = ORM::factory('config')->where('module', '=', $this->module)->where('language_id', '=', 0)->find_all()->as_array();
		}
		
		foreach ($orm as $v)
		{
			Kohana::$config->load('module')->set($v->key, $v->value);
		}
	}
	
	public static function route($name = '')
	{
		switch (Common_Main::language_id())
		{
			case 0:
			case 1:
				$route = array(
							'main' => 'main/',
							'list' => 'list/',
							'detail' => 'detail/',
							'articles' => 'articles/',
							'article' => 'article/',
						 );
				break;
			case 3:
				$route = array(
							'main' => 'cn/',
							'list' => 'cn_list/',
							'detail' => 'cn_detail/',
							'articles' => 'cn_articles/',
							'article' => 'cn_article/',
						 );
				break;
			case 2:
				$route = array(
							'main' => 'hk/',
							'list' => 'hk_list/',
							'detail' => 'hk_detail/',
							'articles' => 'hk_articles/',
							'article' => 'hk_article/',
						 );
				break;
		}
		return isset($route[$name]) ? $route[$name] : '';
	}
	
	public static function url($route = '', $rewrite_url = '', $id = 0, $pre = '')
	{
		$pre .= (trim($pre) == '' ? '' : '/');
		$str = ($rewrite_url == '' ? Web::route($route).$pre.$id : Web::route($route).$pre.$rewrite_url);
		return URL::site($str).'.html';
	}
	public static function query($str = '')
	{
		unset($_GET['language_id']);
		return URL::site($str).'.html'.URL::query();
	}
	
	/**
	*	
	*/
	public static function get_catalog($cat = 'header')
	{
		return ORM::factory('catalog')->where('title', '=', $cat)->or_where('id', '=', $cat)->find();		
	}
	/**
	*	网站导航菜单
	*/
	public static function get_catalogs($position = 'header', $cat = '')
	{
		$catalog = ORM::factory('catalog')->where('title', '=', $position)->or_where('id', '=', $position)->find();
		
		if ( ! $catalog->loaded() ) return array();
		$menu = Common_Main::factory('catalog', 'parent_id')
							 ->get_treeviews_data($catalog->id, array('id', 'pk', 'parent_id', 'title', 'link', 'thumb', 'image', 'desc', 'rewrite_url', 'target', 'status'), 1);
		unset($catalog);
		foreach ($menu as $k => $v)
		{
			if (trim($v['link']) != '')
			{
				$link = $v['link'];
			}
			else
			{
				$link = Web::url('articles', $v['rewrite_url'], $v['pk']);
			}
			$menu[$k]['link']  = $link;
			$menu[$k]['class'] = '';
			if ((is_numeric($cat) && $cat == $v['pk']) || ($cat != '' && $cat == $v['rewrite_url']))
			{
				$menu[$k]['class'] = 'current';
			}
		}
		return $menu;
	}
	/*
	<ol class="sub_list">
						<?php foreach ($v['sub_items'] as $sub) : ?>
						<li> - <a href="<?php echo Web::url('list', $sub['rewrite_url'], $sub['id']); ?>"><?php echo $sub['title']; ?></a></li>
						<?php endforeach; ?>
					</ol>
	*/
	public static function show_sub_items($sub_items = array(), $route = 'list')
	{
		if ( ! isset($sub_items) || count($sub_items) == 0) return '';
		
		$html = '<ol class="sub_list">';
		foreach ($sub_items as $v)
		{
			$html .= '<li>';
			$html .= '<a href="'.Web::url($route, $v['rewrite_url'], $v['id']).'">'.$v['title'].'</a>';
			$html .= self::show_sub_items($v['sub_items'], $route);
			$html .= '</li>';
		}
		$html .= '</ol>';
		return $html;
	}
	/**
	*	产品分类
	*/
	public static function product_category($cat = 0)
	{
		if ($cat > 0)
		{
			$category = ORM::factory('product_category')->where('id', '=', $cat)->find();	
			if ( ! $category->loaded() ) return array();
		}
		$menu = Common_Main::factory('product_category', 'parent_id')
							 ->get_treeviews_data($cat, array('id', 'pk', 'parent_id', 'title', 'rewrite_url', 'target', 'status'), 1);
		
		foreach ($menu as $k => $v)
		{
			$link = Web::url('list', $v['rewrite_url'], $v['pk']);
			
			$menu[$k]['link']  = $link;
			$menu[$k]['class'] = '';
			if ((is_numeric($cat) && $cat == $v['pk']) || ($cat != '' && $cat == $v['rewrite_url']))
			{
				$menu[$k]['class'] = 'current';
			}
		}
		return $menu;
	}
	
	/*
	 * 产品列表
	 */
	public function get_products($cat = 0, $keyword = '', $page = 1, $rows = 10, $recommend = '')
	{
		$orm = ORM::factory('product');
		$total_rows = ORM::factory('product');
		
		if ($cat > 0)
		{
			$orm->where('category_id', '=', $cat);
			$total_rows->where('category_id', '=', $cat);
		}
		if ($recommend != '')
		{
			$orm->where($recommend, '=', 1);
			$total_rows->where($recommend, '=', 1);
		}
		if (trim($keyword) != '')
		{
			$orm->where_open();
			$orm->where('title', 'like', '%'.$keyword.'%')->or_where('model', '=', '%'.$keyword.'%')->or_where('seo_title', 'like', '%'.$keyword.'%');
			$orm->where_close();
			
			$total_rows->where_open();
			$total_rows->where('title', 'like', '%'.$keyword.'%')->or_where('model', '=', '%'.$keyword.'%')->or_where('seo_title', 'like', '%'.$keyword.'%');
			$total_rows->where_close();
		}
		//print_r(Request::current()->uri(array('page' => 2)));die;
		$total_rows = $total_rows->count_all();
		$pagination = new Pagination(array(
			'current_page'      => array('source' => 'route', 'key' => 'page'),
			'total_items' => $total_rows, 
			'items_per_page' => $rows,  // set this to 30 or 15 for the real thing, now just for testing purposes...
		));
		
		$pagination = $pagination->render();
		
		//数据信息
		$data = $orm->offset(($page-1)*$rows)->limit($rows)->find_all()->as_array();
		
		if ( count($data) > 0)
		{
			$data = Common_Main::bind_language('product', $data, Common_Main::language_id());
		}
		return array('items' => $data, 'pagination' => $pagination);
	}
	
	/**
	 *	文章列表
	 */
	public static function get_articles($catalog_id = 0, $page = 1, $rows = 10)
	{
		$orm  = ORM::factory('article')->join('article_catalog', 'left');
		$data = $orm->on('article_catalog.article_id', '=', 'article.id')
					->where('article_catalog.catalog_id', '=', $catalog_id)
					->offset(($page-1)*$rows)
					->limit($rows)
					->order_by('article_catalog.sort_order', 'asc')
					->find_all()
					->as_array();
					
		$count  = ORM::factory('article')->join('article_catalog', 'left');
		$count = $count->on('article_catalog.article_id', '=', 'article.id')
					->where('article_catalog.catalog_id', '=', $catalog_id)
					->count_all();
		
		if ( ! empty($data) && $orm->many_language === true) 
		{
			$data = Common_Main::bind_language('article', $data, Common_Main::language_id());
		}
		
		$pagination = new Pagination(array(
			'current_page'      => array('source' => 'route', 'key' => 'page'),
			'total_items' => $count, 
			'items_per_page' => $rows,  // set this to 30 or 15 for the real thing, now just for testing purposes...
		));
		
		$pagination = $pagination->render();
		
		return array('items' => $data, 'pagination' => $pagination);
	}
	
	/**
	 *	文章详情
	 */
	public static function get_article($id)
	{
		if (is_numeric($id))
		{
			$article = ORM::factory('article', $id);
		}
		else
		{
			$article = ORM::factory('article')->where('rewrite_url', 'like', $id)->find();	
		}
		$article = Common_Main::bind_language('article', $article, Common_Main::language_id())->as_array();
		
		$article['contents'] = ORM::factory('article_contents')
									->where('article_id', '=', $article['id'])
									->where('language_id', '=', Common_Main::language_id())
									->order_by('id', 'asc')
									->find_all()
									->as_array();
		if (count($article['contents']) == 0)
		{
			$article['contents'] = ORM::factory('article_contents')
										->where('article_id', '=', $article['id'])
										->where('language_id', '=', 0)
										->order_by('id', 'asc')
										->find_all()
										->as_array();		
		}
		return $article;
	}
	
	/**
	 * 获取轮播列表
	 */
	public static function get_carousel($group_id, $limit = 5)
	{
		$orm = ORM::factory('api_carousel_value')->where('group_id', '=', $group_id)->where('status', '=', 1)->order_by('sort_order', 'asc')->limit($limit)->find_all()->as_array();
		
		return $orm;
	}
	
	/**
	 *	友情链接
	 */
	public static function get_friendly_links($limit, $is_home = 1)
	{	
		$links = ORM::factory('friendlylinks')->where('status', '=', 1)->order_by('sort_order', 'asc')->limit($limit)->find_all()->as_array();		
		return $links;
	}
	
	/**
	 *	获取配置项
	 */
	public static function config($key, $default = NULL)
	{
		return Kohana::$config->load('module')->get($key);
	}
	
	/**
	 * 
	 * 模型初始化信息 在模型操作时使用
	 */
	function init()
	{
		$this->model = ORM::factory($this->_model_name);
		//读取列信息  表字段注释信息
		$this->table = $this->model->table_columns();		
		
		$this->columns = array_keys($this->table);		
		
		//获取主键名称 用于编辑删除操作
		$this->pk = $this->model->primary_key();
	}
	/**
	 * 
	 * 通用表单保存
	 * @return pk
	 */
	public function save()
	{
		//初始化 model配置 
		$this->init();
		
		//获取 POST数据
		if ($this->customer_data == NULL)
		{
			$data = $this->request->post();
		}
		else
		{
			$data = $this->customer_data;
		}
		//因为需要兼容Add 与 Edit操作   为 Add操作默认pk为NULL
		$data[$this->pk] = (isset($data[$this->pk]) && ! empty($data[$this->pk]) ? $data[$this->pk] : NULL);
		
		$primary_key = $data[$this->pk];
		$orm = ORM::factory($this->_model_name, $primary_key);
		
		foreach($this->columns as $k=>$v)
		{
			if (isset($data[$v]) && is_array($data[$v]))
			{
				$orm->$v = implode(',', $data[$v]);
			}
			elseif (isset($data[$v]) && $data[$v] !== NULL)
			{
				$orm->$v = $data[$v];
			}
		}
		
		$orm->save();
		$primary_key = $orm->pk();
		
		return $primary_key;
		
	}
	public static function error($error = '')
	{
		$view = View::factory("error");
		View::set_global('title', "System Error");
		$view->message = $error;
		echo $view->render();
		exit;
	}
	
	
	/**
	 * 判断是否有Template处理，如果有就输出渲染到前台
	 * @see Kohana_Controller::after()
	 */
	function after()
	{
		if (!empty($this->template))
		{
			//URL 前缀
			
			$this->template->self =  $this;
			$this->template->info     = $this->info;
			$this->template->error    = $this->error ;
			$this->template->warning  = $this->warning ;
			$this->template->success  = $this->success ;
			$this->response->body($this->template->render());
		}
		parent::after();	
	}
}
