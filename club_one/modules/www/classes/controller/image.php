<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Image extends Controller_Main{
	
	function action_index()
	{
		$file = $this->request->param('file');
		$ext  = $this->request->param('ext');
		
		$orig_file = DOCROOT.'assets/'.substr($file, 0, strrpos($file, '_'));
		list($width, $height) = explode('x', substr($file, strrpos($file, '_')+1, 10));
		
		$image = Image::factory($orig_file);
		$image->resize($width, $height, 'WIDTH');
		$image->save(DOCROOT.'assets/'.$file.'.'.$ext);
		
		header('Content-type: image/'.$ext);
		die($image->render());
	}
}
