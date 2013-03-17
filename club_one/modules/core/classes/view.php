<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Acts as an object wrapper for HTML pages with embedded PHP, called "views".
 * Variables can be assigned with the view object and referenced locally within
 * the view.
 *
 * @package    Kohana
 * @category   Base
 * @author     Kohana Team
 * @copyright  (c) 2008-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class View extends Kohana_View{

	/**
	 * Sets the view filename.
	 *
	 *     $view->set_filename($file);
	 *
	 * @param   string  view filename
	 * @return  View
	 * @throws  View_Exception
	 */
	public function set_filename($file)
	{
		$theme = Kohana::$config->load('module')->get('theme');
		
		if (($path = Kohana::find_file('views/'.$theme, $file)) === FALSE)
		{
			if (($path = Kohana::find_file('views', $file)) === FALSE)
			{
				throw new View_Exception('The requested view :file could not be found', array(
					':file' => 'views/'.$theme.'/'.$file . ' AND views/'.$file,
				));
			}
		}

		// Store the file path locally
		$this->_file = $path;

		return $this;
	}
	
	/**
	 * Recursively finds all of the files in the specified directory at any
	 * location in the [Cascading Filesystem](kohana/files), and returns an
	 * array of all the files found, sorted alphabetically.
	 *
	 *     // Find all view files.
	 *     $views = Kohana::list_files('views');
	 *
	 * @param   string  directory name
	 * @param   array   list of paths to search
	 * @return  array
	 */
	public static function themes($path = NULL)
	{
		// Create an array for the files
		$found = array();

		if (is_dir($path))
		{
			// Create a new directory iterator
			$dir = new DirectoryIterator($path);

			foreach ($dir as $file)
			{
				// Get the file name
				$filename = $file->getFilename();

				if ($filename[0] === '.' OR $filename[strlen($filename)-1] === '~')
				{
					// Skip all hidden files and UNIX backup files
					continue;
				}

				// Relative filename is the array key
				$key = $filename;

				if ($file->isDir()) $found[$key] = $key;
				
			}
		}

		// Sort the results alphabetically
		ksort($found);

		return $found;
	}
	
} // End View
