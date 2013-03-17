<?php defined('SYSPATH') or die('No direct script access.');
defined('SAE_ACCESSKEY') or die('Cache_Sae_Memcache Must run at Sina AppEngine!');
/**
 * [Kohana Cache](api/Kohana_Cache) SAE Memcache driver,
 * 
 * ### Supported cache engines
 * 
 * *  [Memcache](http://www.php.net/manual/en/book.memcache.php)
 * *  [Memcached-tags](http://code.google.com/p/memcached-tags/)
 * *  [SAE Memcache] (http://sae.sina.com.cn/?m=devcenter&catId=201)
 * 
 * ### Configuration example
 * 
 * Below is an example of a _memcache_ server configuration.
 * 
 *     return array(
 *          'default'   => array(                          // Default group
 *                  'driver'         => 'memcache',        // using Memcache driver
 *                  'compression'    => FALSE,             // Use compression?
 *           ),
 *     )
 * 
 * In cases where only one cache group is required, if the group is named `default` there is
 * no need to pass the group name when instantiating a cache instance.
 * 
 * ### System requirements
 * 
 * *  Kohana 3.0.x
 * *  PHP 5.2.4 or greater
 * *  SAE Memcache 
 * *  Zlib
 * 
 * @package    Kohana/Cache
 * @category   Base
 * @version    2.0
 * @author     AminBy Team
 * @copyright  (c) AminBy
 * @license    http://aminby.net
 */
class Kohana_Cache_Sae_Memcache extends Cache {

	// Memcache has a maximum cache lifetime of 30 days
	const CACHE_CEILING = 2592000;

	/**
	 * Memcache resource
	 *
	 * @var Memcache
	 */
	protected $_memcache;

	/**
	 * Constructs the memcache Kohana_Cache object
	 *
	 * @param   array     configuration
	 * @throws  Kohana_Cache_Exception
	 */
	protected function Kohana_Cache_Sae_Memcache(array $config)
	{
		// Check for the memcache extention
		if ( ! function_exists('memcache_init'))
		{
			throw new Kohana_Cache_Exception('Script don\'t run in SAE');
		}

		parent::__construct($config);

		// Setup Memcache
		$this->_memcache = memcache_init();
		
		if (empty($this->_memcache)) {
			throw new Kohana_Cache_Exception('memcache_init failed!');
		}

		// Setup the flags
		$this->_flags = Arr::get($this->_config, 'compression', FALSE) ? MEMCACHE_COMPRESSED : FALSE;
	}

	/**
	 * Retrieve a cached value entry by id.
	 * 
	 *     // Retrieve cache entry from memcache group
	 *     $data = Cache::instance('memcache')->get('foo');
	 * 
	 *     // Retrieve cache entry from memcache group and return 'bar' if miss
	 *     $data = Cache::instance('memcache')->get('foo', 'bar');
	 *
	 * @param   string   id of cache to entry
	 * @param   string   default value to return if cache miss
	 * @return  mixed
	 * @throws  Kohana_Cache_Exception
	 */
	public function get($id, $default = NULL)
	{
		// Get the value from Memcache
		$value = $this->_memcache->get($this->_sanitize_id($id));

		// If the value wasn't found, normalise it
		if ($value === false)
		{
			$value = (NULL === $default) ? NULL : $default;
		}

		// Return the value
		return $value;
	}

	/**
	 * Set a value to cache with id and lifetime
	 * 
	 *     $data = 'bar';
	 * 
	 *     // Set 'bar' to 'foo' in memcache group for 10 minutes
	 *     if (Cache::instance('memcache')->set('foo', $data, 600))
	 *     {
	 *          // Cache was set successfully
	 *          return
	 *     }
	 *
	 * @param   string   id of cache entry
	 * @param   mixed    data to set to cache
	 * @param   integer  lifetime in seconds, maximum value 2592000
	 * @return  boolean
	 */
	public function set($id, $data, $lifetime = 3600)
	{
		// Set the data to memcache
		return $this->_memcache->set($this->_sanitize_id($id), $data, $this->_flags, $lifetime);
	}

	/**
	 * Delete a cache entry based on id
	 * 
	 *     // Delete the 'foo' cache entry immediately
	 *     Cache::instance('memcache')->delete('foo');
	 * 
	 *     // Delete the 'bar' cache entry after 30 seconds
	 *     Cache::instance('memcache')->delete('bar', 30);
	 *
	 * @param   string   id of entry to delete
	 * @param   integer  timeout of entry, if zero item is deleted immediately, otherwise the item will delete after the specified value in seconds
	 * @return  boolean
	 */
	public function delete($id, $timeout = 0)
	{
		return $this->_memcache->delete($this->_sanitize_id($id), $timeout);
	}

	/**
	 * Delete all cache entries.
	 * 
	 * Beware of using this method when
	 * using shared memory cache systems, as it will wipe every
	 * entry within the system for all clients.
	 * 
	 *     // Delete all cache entries in the default group
	 *     Cache::instance('memcache')->delete_all();
	 *
	 * @return  boolean
	 */
	public function delete_all()
	{
		$result = $this->_memcache->flush();

		// We must sleep after flushing, or overwriting will not work!
		// @see http://php.net/manual/en/function.memcache-flush.php#81420
		sleep(1);

		return $result;
	}
}