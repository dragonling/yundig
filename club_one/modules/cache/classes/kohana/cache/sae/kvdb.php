<?php defined('SYSPATH') or die('No direct script access.');
defined('SAE_ACCESSKEY') or die('Cache_Sae_KVDB Must run at Sina AppEngine!');
/**
 * [Kohana Cache](api/Kohana_Cache) SAE kvdb Cache driver,
 * 
 * ### Supported cache engines
 * 
 * *  [SAE KVDB] (http://sae.sina.com.cn/?m=devcenter&catId=199)
 * 
 * ### Configuration example
 * 
 * Below is an example of a _kvdb_ server configuration.
 * 
 *     return array(
 *          'default'   => array(                          // Default group
 *                  'driver'         => 'kvdb',        // using kvdb driver
 *                  // 'compression'    => FALSE,             // Use compression? unsupported
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
 * *  SAE kvdb 
 * *  Zlib
 * 
 * @package    Kohana/Cache
 * @category   Base
 * @version    2.0
 * @author     AminBy Team
 * @copyright  (c) AminBy
 * @license    http://aminby.net
 */
class Kohana_Cache_Sae_KVDB extends Cache {
	
	const KEYPREFIX = 'SAEKVC';

	// kvdb has a maximum cache lifetime of 30 days
	const CACHE_CEILING = 2592000;

	/**
	 * kvdb resource
	 *
	 * @var kvdb
	 */
	protected $_kvdb;

	/**
	 * Constructs the kvdb Kohana_Cache object
	 *
	 * @param   array     configuration
	 * @throws  Kohana_Cache_Exception
	 */
	protected function __construct(array $config)
	{
		// Check for the kvdb extention
		if ( ! class_exists('SaeKV'))
		{
			throw new Kohana_Cache_Exception('Script don\'t run in SAE');
		}

		parent::__construct($config);

		// Setup kvdb
		$this->_kvdb = new SaeKV();
		
		if (!$this->_kvdb->init()) {
			throw new Kohana_Cache_Exception('kvdb_init failed!');
		}
	}

	/**
	 * Retrieve a cached value entry by id.
	 * 
	 *     // Retrieve cache entry from kvdb group
	 *     $data = Cache::instance('sae_kvdb')->get('foo');
	 * 
	 *     // Retrieve cache entry from kvdb group and return 'bar' if miss
	 *     $data = Cache::instance('sae_kvdb')->get('foo', 'bar');
	 *
	 * @param   string   id of cache to entry
	 * @param   string   default value to return if cache miss
	 * @return  mixed
	 * @throws  Kohana_Cache_Exception
	 */
	public function get($id, $default = NULL)
	{
		// Get the value from kvdb
		$value = $this->_kvdb->get(self::KEYPREFIX.$this->_sanitize_id($id));

		// If the value wasn't found, normalise it
		if ($value === false)
		{
			$data = (NULL === $default) ? NULL : $default;
		}
		
		list($lifetime, $data) = $value;
		
		if ($lifetime <= time()) {
			$this->_kvdb->delete(self::KEYPREFIX.$this->_sanitize_id($id));
			$data = (NULL === $default) ? NULL : $default;
		}

		// Return the value
		return $data;
	}

	/**
	 * Set a value to cache with id and lifetime
	 * 
	 *     $data = 'bar';
	 * 
	 *     // Set 'bar' to 'foo' in kvdb group for 10 minutes
	 *     if (Cache::instance('sae_kvdb')->set('foo', $data, 600))
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
		$method = 'replace';
		if ($this->get($id) === NULL)
			$method = 'add';
			
		// Set the data to kvdb
		return $this->_kvdb->$method(self::KEYPREFIX.$this->_sanitize_id($id), array(time() + $lifetime, $data));
	}

	/**
	 * Delete a cache entry based on id
	 * 
	 *     // Delete the 'foo' cache entry immediately
	 *     Cache::instance('sae_kvdb')->delete('foo');
	 * 
	 *     // Delete the 'bar' cache entry after 30 seconds
	 *     Cache::instance('sae_kvdb')->delete('bar', 30);
	 *
	 * @param   string   id of entry to delete
	 * @param   integer  timeout of entry, if zero item is deleted immediately, otherwise the item will delete after the specified value in seconds
	 * @return  boolean
	 */
	public function delete($id, $timeout = 0)
	{
		return $this->set($id, $this->get($id), $timeout);
	}

	/**
	 * Delete all cache entries.
	 * 
	 * Beware of using this method when
	 * using shared memory cache systems, as it will wipe every
	 * entry within the system for all clients.
	 * 
	 *     // Delete all cache entries in the default group
	 *     Cache::instance('sae_kvdb')->delete_all();
	 *
	 * @return  boolean
	 */
	public function delete_all()
	{
		$result = true;
		do {
			$ret = $this->_kvdb->pkrget(self::KEYPREFIX, 100);
			
			if ($ret !== false) {
				foreach($ret as $k => $v) {
					$result = $this->_kvdb->delete($k);
					if (!$result) {
						$ret = false;
						break;
					}
				}
			}
		}
		while(!empty($ret));

		return $result;
	}
}