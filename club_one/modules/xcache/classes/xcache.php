<?php defined('SYSPATH') or die('No direct script access.');
/**
 * 
 * FOR Caching Management Add Tags to caching keys
 * @author Dragon
 *
 */
class Xcache 
{
	/**
	 * Set a value based on an id with tags
	 * 
	 * @param   string   id 
	 * @param   mixed    data 
	 * @param   integer  lifetime [Optional]
	 * @param   array    tags [Optional]
	 * @return  boolean
	 */
	public static function add_tag($id, $data, $lifetime = NULL, array $tags = NULL)
	{
		if($tags)
		{
			foreach($tags as $v)
			{
				
				$ids = Cache::instance()->get($v,array());
				
				//echo Debug::vars($ids);die;
				array_push($ids, $id);
				Cache::instance()->set($v, $ids,$lifetime);	
			}
			
		}
		return Cache::instance()->set($id, $data,$lifetime);		
		
	}
	/**
	 * 
	 * Delete Tag includes there id
	 * @param unknown_type $id
	 */
	public static function delete_tag($id)
	{
		$keys = Cache::instance()->get($id,array());
		foreach($keys as $key)
		{
			Cache::instance()->delete($key);
		}
		Cache::instance()->delete($id);
	}
}