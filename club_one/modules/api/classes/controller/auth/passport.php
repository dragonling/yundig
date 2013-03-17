<?php defined('SYSPATH') or die('No direct script access.');
/**
 * 
 * SSL认证接口
 * @author Shunnar
 *
 */
class Controller_Auth_Passport extends Controller_Api{

		var $ecnrypt;

		public function before()
		{
			parent::before();
			//$this->ecnrypt = new Encrypt('key',MCRYPT_MODE_ECB,MCRYPT_RIJNDAEL_256);
		}

		public  function action_index()
		{
			$url = $this->request->query('url');

			$key = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];
			$encrypt = Encrypt::instance('auth')->encode($key);
			//echo Encrypt::instance('auth')->decode('E4CDM9BG3RHJBSfqRSVo6zdXrg==');;
			//echo Debug::vars($_SERVER);
			Cookie::$domain = '.stblive.com';
			Cookie::set('auth', $encrypt);
			if($url)
			{
				$this->request->redirect($url);
			}
			//echo 	Cookie::get('theme');			
		}
		public function action_get()
		{
			echo Cookie::get('theme');
		}
}


