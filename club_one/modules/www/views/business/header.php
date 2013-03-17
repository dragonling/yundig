<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title . ' - ' . Web::config('name')?></title>
<meta name="keywords" content="<?php echo $keywords != '' ? $keywords : Web::config('keywords') ?>" />
<meta name="description" content="<?php echo $description != '' ? $description : Web::config('description') ?>" />
<link href="<?php echo Kohana::$base_url ?>assets/themes/business/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Kohana::$base_url ?>assets/themes/business/css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
</head>
<body>

<div id="templatemo_wrapper">

	<div id="templatemo_header">
    
    	<div id="site_title">
            <h1><a href="/" title="<?php echo Web::config('name') ?>">
                <img src="<?php echo Kohana::$base_url ?>assets/themes/business/images/templatemo_logo.png" alt="<?php echo Web::config('name') ?>" />
                <span><?php echo Web::config('name') ?></span>
            </a></h1>
        </div>
        
        <div id="templatemo_menu">
    
            <ul>
				<?php foreach (Web::get_catalog('header', $cat) as $nav) { ?>
					<li><a href="<?php echo $nav['link'] ?>" class="<?php echo $nav['class'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a></li>
				<?php } ?>
            </ul>    	
    
    	</div> <!-- end of templatemo_menu -->
        
        <div class="cleaner"></div>
	</div> <!-- end of header -->
    
    <div id="templatemo_content">
    