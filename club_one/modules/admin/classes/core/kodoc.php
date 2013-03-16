<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Documentation 
 *
 * @package    admin
 * @category   Base
 * @author     Dragon List
 * @copyright  (c) 2012 Dragon
 * @license    http://www.konasi.com/license
 */
class Core_Kodoc {
	
	/**
	 * Get all classes and methods of files in a list.
	 *
	 * >  I personally don't like this as it was used on the index page.  Way too much stuff on one page.  It has potential for a package index page though.
	 * >  For example:  class_methods( Kohana::list_files('classes/sprig') ) could make a nice index page for the sprig package in the api browser
	 * >     ~bluehawk
	 *
	 */
	public static function class_methods(array $list = NULL)
	{
		$list = self::classes($list);

		$classes = array();

		foreach ($list as $class)
		{
			$_class = new ReflectionClass($class);

			if (stripos($_class->name, 'Kohana_') === 0)
			{
				// Skip transparent extension classes
				continue;
			}

			$methods = array();

			foreach ($_class->getMethods() as $_method)
			{
				$declares = $_method->getDeclaringClass()->name;

				if (stripos($declares, 'Kohana_') === 0)
				{
					// Remove "Kohana_"
					$declares = substr($declares, 7);
				}

				if ($declares === $_class->name OR $declares === "Core")
				{
					$methods[] = $_method->name;
				}
			}

			sort($methods);

			$classes[$_class->name] = $methods;
		}

		return $classes;
	}
	
	/**
	 * Returns an array of all the classes available, built by listing all files in the classes folder and then trying to create that class.
	 *
	 * This means any empty class files (as in complety empty) will cause an exception
	 *
	 * @param   array   array of files, obtained using Kohana::list_files
	 * @return  array   an array of all the class names
	 */
	static function classes($list = array())
	{
		$classes = array();
		foreach ($list as $name => $path)
		{
			if (is_array($path))
			{
				$classes += self::classes($path);
			}
			else
			{
				// Remove "classes/" and the extension
				$class = substr($name, 0, -(strlen(EXT)));

				// Convert slashes to underscores
				$class = str_replace(DIRECTORY_SEPARATOR, '_', strtolower($class));

				$classes[$class] = $class;
			}
		}
		return $classes;
	}
}
