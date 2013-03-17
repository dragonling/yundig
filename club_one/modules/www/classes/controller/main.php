<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Web{
	
	function before()
	{
		isset($_GET['language_id']) ? '' : $_GET['language_id'] = 0;
		$_GET['language_id'] == 1 ? $_GET['language_id'] = 0 : '';
		parent::before();
		View::set_global('self', $this);
		View::set_global('title', '');
		View::set_global('keywords', '');
		View::set_global('description', '');
		View::set_global('cat', $this->request->param('cat'));
	}
	
	/**
	 * 首页
	 */
	function action_index()
	{		
		$new_product  = $this->get_products(0, '', 1, 8, 'is_new');
		$feat_product = $this->get_products(0, '', 1, 2, 'is_featured');
		
		$view = View::factory('index');
		
		$view->set('new_products', $new_product['items']);
		$view->set('feat_product', $feat_product['items']);
		
		View::set_global('cat', '9');
		View::set_global('title', Web::config('title'));
		View::set_global('keywords', Web::config('keywords'));
		View::set_global('description', Web::config('description'));
		$this->response->body($view->render());
	}
	
	/**
	 * 产品列表
	 */
	function action_products()
	{
		$data = $this->get_products(1);
		echo $data['pagination'];
	}
	
	/**
	 * 产品详细
	 */
	function action_detail()
	{
		$id = $this->request->param('id');
		if (empty($id)) Web::error('Product param can not empty!');
		if (is_numeric($id))
		{
			$product = ORM::factory('product', $id)->as_array();			
		}
		else
		{
			$product = ORM::factory('product')->where('rewrite_url', 'like', $id)->find()->as_array();			
		}
		$cat = $product['category_id'];
		if (is_numeric($cat))
		{
			$cat = ORM::factory('product_category', $cat)->as_array();			
		}
		else
		{
			$cat = ORM::factory('product_category')->where('rewrite_url', 'like', $cat)->find()->as_array();			
		}
		$product['contents'] = ORM::factory('product_contents')
									->where('product_id', '=', $product['id'])
									->where('language_id', '=', Common_Main::language_id())
									->order_by('id', 'asc')
									->find_all()
									->as_array();
		if (isset($product['template']) && trim($product['template']) != '')
		{
			$view = View::factory($product['template']);
		}
		else
		{
			$view = View::factory('detail');
		}
		
		$product['images'] = explode(',', $product['images']);
		$product['images'] = array_filter($product['images']);
		$product['images'] = array_values($product['images']);
		if (count($product['images']) == '') $product['images'][0] = $product['thumb'];
				
		$view->set('data', $product);
		View::set_global('title', $product['seo_title'] == '' ? $product['title'] : $product['seo_title']);
		
		$this->template = $view;
		
	}
	/**
	 *	分类列表页
	 */
	function action_list()
	{
		$cat  = $this->request->param('cat');
		$page = $this->request->param('page', 1);
		if (empty($cat)) Web::error('Category param can not empty!');
		if (is_numeric($cat))
		{
			$cat = ORM::factory('product_category', $cat);			
		}
		else
		{
			$cat = ORM::factory('product_category')->where('rewrite_url', 'like', $cat)->find();			
		}
		if ( ! $cat->loaded())
		{
			Web::error('An unexpected error has occurred.');
		}
		
		$cat = Common_Main::bind_language('product_category', $cat, Common_Main::language_id())->as_array();
		
		if (isset($cat['template']) && trim($cat['template']) != '')
		{
			$view = View::factory($cat['template']);
		}
		else
		{
			$view = View::factory('list');
		}
		
		$data = $this->get_products($cat['id'], '', $page, 12);
		
		$view->set('category', $cat);
		$view->set('data', $data['items']);
		$view->set('pagination', $data['pagination']);
		
		View::set_global('title', $cat['seo_title'] == '' ? $cat['title'] : $cat['seo_title']);
		View::set_global('keywords', $cat['seo_keywords']);
		View::set_global('description', $cat['seo_description']);
		
		$this->template = $view;
	}
	/**
	 *	分类列表页
	 */
	function action_articles()
	{
		$cat  = $this->request->param('cat');
		$page = $this->request->param('page', 1);
		if (empty($cat)) Web::error('catalog param can not empty!');
		if (is_numeric($cat))
		{
			$cat = ORM::factory('catalog', $cat);			
		}
		else
		{
			$cat = ORM::factory('catalog')->where('rewrite_url', 'like', $cat)->find();			
		}
		
		$cat = Common_Main::bind_language('catalog', $cat, Common_Main::language_id())->as_array();
		
		if (isset($cat['template']) && trim($cat['template']) != '')
		{
			$view = View::factory($cat['template']);
		}
		else
		{
			$view = View::factory('article_list');
		}
		
		$data = $this->get_articles($cat['id'], $page, 15);
		
		$view->set('catalog', $cat);
		$view->set('data', $data['items']);
		$view->set('pagination', $data['pagination']);
		
		View::set_global('title', $cat['seo_title'] == '' ? $cat['title'] : $cat['seo_title']);
		
		$this->template = $view;
	}
	
	function action_article()
	{
		$cat = $this->request->param('cat');
		$id = $this->request->param('id');
		if (empty($cat)) Web::error('catalog param can not empty!');
		if (is_numeric($cat))
		{
			$cat = ORM::factory('catalog', $cat);
		}
		else
		{
			$cat = ORM::factory('catalog')->where('rewrite_url', 'like', $cat)->find();
		}
		$cat = Common_Main::bind_language('catalog', $cat, Common_Main::language_id())->as_array();
		
		
		$article = $this->get_article($id);
		if (isset($article['template']) && trim($article['template']) != '')
		{
			$view = View::factory($article['template']);
		}
		else
		{
			$view = View::factory('article');
		}
				
		$view->set('catalog', $cat);
		$view->set('data', $article);
		View::set_global('title', $article['seo_title'] == '' ? $article['title'] : $article['seo_title']);
		
		$this->template = $view;
		
	}
	
	function action_feeback()
	{
		//获取 POST数据
		$data = $this->request->post();
		
		if ($this->request->referrer() == '') die('Error!');
		
		if ( ! isset($data['email']) ||  ! isset($data['content']) || trim($data['email']) == '' || trim($data['content']) == '')
		{
			$req = $this->request->referrer().URL::query(array('msg' => i18n::get('msg_feeback_fail', 'common')));			
			$this->request->redirect($req);
		}
		$data['act_time'] = time();
		$data['status']   = 1;
		$orm = ORM::factory('feeback');
		$columns = $orm->table_columns();
		$columns = array_keys($columns);
		
		foreach($columns as $k=>$v)
		{
			if (isset($data[$v]) && is_array($data[$v]))
			{
				$orm->set($v, implode(',', $data[$v]));
			}
			elseif (isset($data[$v]) && $data[$v] !== NULL)
			{
				$orm->set($v, $data[$v]);
			}			
		}
		$orm->save();
		
		$email = Email::factory();
		if (Kohana::$config->load('module')->get('mail_type') == 'smtp' && Kohana::$config->load('module')->get('smtp_host') != '')
		{
			$smtp_config['protocol'] = Kohana::$config->load('module')->get('mail_type');
			$smtp_config['hostname'] = Kohana::$config->load('module')->get('smtp_host');
			$smtp_config['username'] = Kohana::$config->load('module')->get('smtp_account');
			$smtp_config['password'] = Kohana::$config->load('module')->get('smtp_password');
			$smtp_config['port']     = Kohana::$config->load('module')->get('smtp_port');
			$email->setConfig($smtp_config);
		}
		$email->setTo($data['email']);
		$email->setSubject('Customer Feeback -- '.$data['nickname']);
		$email->setText($data['content']);
		try
		{		
			$email->send();
			$req = $this->request->referrer().URL::query(array('msg' => i18n::get('msg_feeback_success', 'common')));
			$this->request->redirect($req);
		}
		catch(Exception $e)
		{			
			$req = $this->request->referrer().URL::query(array('msg' => i18n::get('msg_feeback_fail', 'common')));
			$this->request->redirect($req);
		}
	}
} // End View
