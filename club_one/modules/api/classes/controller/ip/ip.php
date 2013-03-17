<?php defined('SYSPATH') or die('No direct script access.');
/**
 * 
 * 本接口获取客户端ip地址和详细地区信息
 * @author tony.zhang
 *
 */
class Controller_Ip_Ip extends Controller_Api{

	public function action_index()
	{
		$ip = $this->request->query('ip')?$this->request->query('ip'):Controller_Api::getIP();
		$location = self::get_location($ip);
		$location_split = explode(' ',$location);
		$data = array(
					'ip' => $ip,
					'location'=>$location_split[0],
					'isp'=>isset($location_split[1])?$location_split[1]:"未知",
					  );
		if($this->request->query('format')=='json')
		{
			$this->response->headers('content-type',  File::mime_by_ext('json'));
			$this->response->body(json_encode($data));		
		}
		else
		{
			$this->response->headers('content-type',  File::mime_by_ext('xml'));
			$this->response->body(Api::to_xml($data,'data'));		
		}
		//echo Debug::vars(self::getCity_ipcn("119.50.231.41"));
	}
	
	static function getCity($ip='')
	{
		if(empty($ip)){
			$ip = Controller_Api::getIP();
		}
		if(class_exists('qqwry'))
		{
			$ipClass = new qqwry(realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'ips.dat');
			//$ip = '219.243.111.255';
		}
		else
		{
			include_once('iplocation.php');
			$ipClass = new ipLocation(realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'ips.dat');
			//$ip = '219.243.231.255';
		}
		$address = $ipClass->q($ip);
		$address1 = iconv('gbk','utf-8//IGNORE',$address[0]);
		preg_match('/([^省市区]*)市/ius',$address1,$city);
		$region = array('新疆','西藏','宁夏','广西','内蒙古');
		foreach ($region as $key=>$value)
		{
			
			$city[1] = str_replace($value,'',$city[1]);
		}
		if(empty($city)){ $city[1] = '北京'; }//如果获取不到省市给定一个预设值
		return $city[1];
	}
	
	static function getCity_ipcn($ip='')
	{
		if(empty($ip)){
			$ip = Controller_Api::getIP();
		}
		//$ip = 
		$cache_key = "API-CITY-".$ip;//设置cache key
		//print_r($key);die;
		$city = Cache::instance()->get($cache_key, FALSE);
		$city = false;
		if($city == false)
		{
			$link = 'http://www.ip.cn/getip2.php?action=queryip&ip_url='.$ip;
			$data = Spider::curl($link);
			$data = iconv('gbk','utf-8//IGNORE',$data);
			preg_match('/来自：(.*)/ius',$data,$data1);
			//echo Debug::vars($data1);
			$city = '';
			if(isset($data1[1]))preg_match('/([^省市区]*)市/ius',$data1[1],$city);
			//print_r($city);die;
			$city = isset($city[1]) ? $city[1] : '';
			$region = array('新疆','西藏','宁夏','广西','内蒙古');
			foreach ($region as $key=>$value)
			{
				$city = str_replace($value,'',$city);
			}
			if(empty($city)){ $city = '北京'; }//如果获取不到省市给定一个预设值
			Xcache::add_tag($cache_key, $city,3600*24,array("API_IP"));
		}
		return $city;
	}
	/**
	 * 获取区域信息
	 */
	public static function get_location($ip='')
	{
		$cache_key = "GEO-INFO-".$ip;//设置cache key
		$location = self::get_geo_info($ip);
	//	echo Debug::vars($location); exit;
		if(! $location )
		{
			$link = "http://opendata.baidu.com/api.php?query={$ip}&co=&resource_id=6006&ie=utf8&cb=bd__cbs__f0j25t&format=json&tn=baidu";
			
			$data = Spider::curl($link,array(),1);
			
			$data = iconv('gbk','utf-8//IGNORE',$data);
			
			preg_match('/bd__cbs__f0j25t\((.*)\)/ius',$data,$json_result);
			
			$json_object = json_decode($json_result[1]);
			
			$location = $json_object->data[0]->location;
			
			self::put_geo_info($ip, $location);
		}
		return $location;
	}
	static function getCity_ip138($ip='')
	{
		//$ip = 
		$cache_key = "API-IP138CITY-".$ip;//设置cache key
		//print_r($key);die;
		$city = Cache::instance()->get($cache_key, FALSE);
		$city = '';
		if($city == false)
		{
			
			$location = self::get_location($ip);
			//TODO 如果是台湾那么以台北为准
			if(strpos($location, "台湾")!==FALSE)
			return "台北";
			if(strpos($location, "香港")!==FALSE)
			return "香港";
			$city = '';
			if(isset($location))preg_match('/([^省市区]*)市/ius',$location,$city);
			//print_r($city);die;
			$city = isset($city[1]) ? $city[1] : '';
			$region = array('新疆','西藏','宁夏','广西','内蒙古');
			foreach ($region as $key=>$value)
			{
				$city = str_replace($value,'',$city);
			}
			//如果获取不到省市给定一个预设值
			if(empty($city)){ 
				$city = '北京'; 
				$file = realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'log';
// 				$writer = new Kohana_Log_File($file);
// 				$message = array(array(
// 								'time'	=>	date('Y-m-d H:i:s',time()),
// 								'level'	=>	LOG_INFO,
// 								'body'	=>	"error IP: ".$ip,
// 				));
// 				$writer->write($message);
			}
			else{
				Xcache::add_tag($cache_key, $city,3600,array("API_IP"));
			}			
		}
		return $city;
	}
	/**
	 * 从存储层获取geo信息
	 * @param IP $ip
	 */
	private static function get_geo_info($ip)
	{
		$ip = preg_replace('/[\d]{1,3}$/',"0",$ip);
		$geo = Storage::instance()->find_one('ip',array('ip'=>$ip),array('location'));
		return $geo?$geo['location']:FALSE;
	}
	/**
	 * 将第三方GEO信息保存到存储层
	 * @param IP $ip
	 * @param Location $location
	 */
	private static function put_geo_info($ip,$location)
	{
		if(empty($location) OR empty($location))
		return FALSE;
		$ip = preg_replace('/[\d]{1,3}$/',"0",$ip);
		//Storage::instance()->save('ip',array('ip'=>preg_replace('/[\d]{1,3}$/',"0",$ip),'location'=>$location));
		
		//如果数据库中存在 那么执行update 不存在就insert
		Storage::instance()->update('ip',array('ip'=>$ip),array('ip'=>$ip,'location'=>$location),array('upsert'=>TRUE));
	}
}
