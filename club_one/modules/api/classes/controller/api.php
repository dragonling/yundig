<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Api extends Controller
{
	protected  $row = 0;
	
	function before()
	{
		//开启日志直接写入
		Kohana_Log::$write_on_add = TRUE;			
		//执行脚本不受内存与执行之间限制
		set_time_limit(60);
		ini_set('memory_limit', '1024M');	
				
		//echo Debug::vars(API::to_xml($this->data));
		
	}
	/**
	 * 
	 * 基本信息鉴权 SN认证
	 */
	function basic_validate()
	{
	}
	/**
	 * 
	 * 返回状态值
	 * @param  $code
	 * @param  $message
	 */
	function code($code,$message="")
	{
		return array(
			"code" => $code,
			"code_info" => $message,
		);
	}
	/**
	 * 
	 * 输出response数据
	 */
	function export($data = NULL,$root = "root",$cdata=array())
	{
		if($this->request->query('format')=='json')
		{
			$this->response->headers('content-type',  File::mime_by_ext('json'));
			$this->response->body(json_encode($data));
		}
		else 
		{
			$this->response->headers('content-type',  'text/xml; charset='.Kohana::$charset);
			$this->response->body(API::to_xml($data,$root,$cdata));
			
		}
		$this->response->send_headers();
		echo $this->response->body();
		exit;				
	}
	
	//*
	//获取客户端ip地址
	//注意:如果你想要把ip记录到服务器上,请在写库时先检查一下ip的数据是否安全.
	//*
	static function getIP() {
	    if (getenv('HTTP_CLIENT_IP')) {
                        $ip = getenv('HTTP_CLIENT_IP'); 
        }
        elseif (getenv('HTTP_X_FORWARDED_FOR')) { //获取客户端用代理服务器访问时的真实ip 地址
                        $ip = getenv('HTTP_X_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_X_FORWARDED')) { 
                        $ip = getenv('HTTP_X_FORWARDED');
        }
        elseif (getenv('HTTP_FORWARDED_FOR')) {
                        $ip = getenv('HTTP_FORWARDED_FOR'); 
        }
        elseif (getenv('HTTP_FORWARDED')) {
                        $ip = getenv('HTTP_FORWARDED');
        }
        else { 
                        $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
	}
}
?>