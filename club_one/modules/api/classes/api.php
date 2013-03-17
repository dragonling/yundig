<?php defined('SYSPATH') or die('No direct script access.');

class Api{
	/**
	 *
	 * 解析XML数据
	 * @param XmlString $data
	 * @return XMLObject
	 */
	public static function parse_xml($data)
	{
		return simplexml_load_string($data,'SimpleXMLElement', LIBXML_NOCDATA);
	}

	public static function to_xml($array,$root = "root",$cdata=array(),$item = 'item')
	{

		$xml ="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<".$root.">\r\n";
		if(empty($array))
		{
			return false;
		}
		$xml .= self::_array2xml($array,$cdata,$item);
		$xml .="</".$root.">";
		return $xml;
	}

	public static function to_rss($array,$cdata=array(),$item = 'item')
	{

		$xml ="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<rss version=\"2.0\">\r\n";
		if(empty($array))
		{
			return false;
		}
		$xml .= self::_array2xml($array,$cdata,$item);

		$xml .="</rss>\r\n";
		return $xml;
	}


	private static function _array2xml($source,$cdata=array(),$item = 'item')
	{
		//$string="<root>\r\n";
		$string = "";
		foreach($source as $k=>$v)
		{
			if(is_numeric($k))
			{
				$string .="<".$item.">";
			}
			else
			{
				//$k = str_replace('@','',$k)  ;
				$string .="<".$k.">";
			}
			if(is_array($v) || is_object($v)){
				$string .= "\r\n";
				$string .= self::_array2xml($v,$cdata,$item);
			}else{
				if(in_array($k,$cdata))
				$v = "<![CDATA[".$v."]]>";
				$string .= $v;
			}
			if(is_numeric($k))
			{
				$string .="</".$item.">";
			}
			else
			{
				str_replace('@','',$v)  ;
				$string .="</".$k.">"."\r\n";
			}

		}
		//$string .= "</root>";
		return $string;

	}
	/**
	 *
	 * 对象数据转化为 Array
	 * @param XMLObject $object
	 * @return ArrayObject
	 */
	public static function object2array($object)
	{
		return @json_decode(@json_encode($object),1);
	}

	/**
	 *
	 * 数组转json
	 * @param array
	 * @return json
	 */
	public static function to_json($array)
	{
		return json_encode($array);
	}

	/**
	 *@author chonder
	 * json转array
	 * @param json
	 * @return array
	 */
	public static function json2array( $json )
	{
		$arr = array();
		foreach( $json as $k => $w )
		{
			if( is_object( $w ) ) $arr[$k] = Api::json2array ($w ); //判断类型是不是object
			else $arr[$k] = $w;
		}
		return $arr;
	}
	

}
?>