<?
class Spider{
	/**
	 *
	 * 解析XML数据
	 * @param String $data
	 * @return XmlObject
	 */
	public static function parse_xml($data)
	{
		return simplexml_load_string($data,'SimpleXMLElement', LIBXML_NOCDATA);
	}
	/**
	 *	新加的curl采集方法，随机伪造客户IP
	 *
	 */
	public static function curl($url, $param = array(), $lifetime = 3600, $tag = NULL, $referer = NULL, $ua = NULL)
	{
		$key = $url.implode('-',$param);
		$ua == NULL && $ua = self::_gen_ua(); //随机使用UA
		//在设置flush参数或者 找不到缓存时需要直接请求代码
		if(isset($_GET['flush']) || !$body = Cache::instance()->get($key, FALSE))
		{
			if($referer == NULL)
			{
				$_url = parse_url($url);
				$referer = $_url['scheme'] . '://' . $_url['host'];
			}
			$ip = '202.121.'.mt_rand(1, 255).'.'.mt_rand(1, 255);
			$headers = array('CLIENT-IP:'.$ip, 'X-FORWARDED-FOR:'.$ip);
			
			$ch = curl_init();  
			$timeout = 5;  
			curl_setopt ($ch, CURLOPT_URL, $url);  
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt ($ch, CURLOPT_USERAGENT, $ua);	//伪造浏览器
			curl_setopt ($ch, CURLOPT_REFERER, $referer);	//伪造来源网址
			curl_setopt ($ch, CURLOPT_ENCODING, '');
			curl_setopt ($ch, CURLOPT_HTTPHEADER , $headers );  //构造IP 
			$body = curl_exec($ch);  
			curl_close($ch);
			
			Xcache::add_tag($key, $body,$lifetime,$tag);
		}
		return  $body;	
	}
	
	private static function _gen_ua()
	{
		$ua[] = "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.79 Safari/535.11";
		$ua[] = "Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.19) Gecko/20110707 Firefox/3.6.19";
		$ua[] = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.168 Safari/535.19";
		$ua[] = "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; InfoPath.3; .NET4.0C; Tablet PC 2.0)";
		$ua[] = "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; InfoPath.3; .NET4.0C; Tablet PC 2.0; SE 2.X MetaSr 1.0)";
		$rand = count($ua)-1;
		return $ua[rand(0,$rand)]	;
	}

}
?>