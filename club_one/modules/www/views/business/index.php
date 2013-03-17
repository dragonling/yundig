<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Web::config('title') . ' - ' . Web::config('name')?></title>
<meta name="keywords" content="<?php echo Web::config('keywords') ?>" />
<meta name="description" content="<?php echo Web::config('description') ?>" />
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
				<?php foreach (Web::get_catalog('header') as $nav) { ?>
					<li><a href="<?php echo $nav['link'] ?>" class="" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a></li>
				<?php } ?>
            </ul>    	
    
    	</div> <!-- end of templatemo_menu -->
        
        <div class="cleaner"></div>
	</div> <!-- end of header -->
    
    <div id="templatemo_content">
			
		<div id="templatemo_slider">

			<div id="one" class="contentslider">
				<div class="cs_wrapper">
					<div class="cs_slider">
					
						<div class="cs_article">
							<a href="http://www.cssmoban.com/" target="_parent">
							<img src="<?php echo Kohana::$base_url ?>assets/themes/business/images/slider/templatemo_slide02.jpg" alt="Project One" />
							</a>
						</div><!-- End cs_article -->
						
						<div class="cs_article">
							<a href="http://www.cssmoban.com/page/2" target="_parent">
							<img src="<?php echo Kohana::$base_url ?>assets/themes/business/images/slider/templatemo_slide01.jpg" alt="Project Two" />
							</a>
						</div><!-- End cs_article -->
						
						<div class="cs_article">
							<a href="http://www.cssmoban.com/page/3" target="_parent">
							<img src="<?php echo Kohana::$base_url ?>assets/themes/business/images/slider/templatemo_slide03.jpg" alt="Project Three" />
							</a>
						</div><!-- End cs_article -->
						
						<div class="cs_article">
							<a href="http://www.cssmoban.com/page/4" target="_parent">
							<img src="<?php echo Kohana::$base_url ?>assets/themes/business/images/slider/templatemo_slide04.jpg" alt="Project Four" />
							</a>
						</div><!-- End cs_article -->
				  
					</div><!-- End cs_slider -->
				</div><!-- End cs_wrapper -->
			</div><!-- End contentslider -->
			
			<!-- Site JavaScript -->
			<script type="text/javascript" src="<?php echo Kohana::$base_url ?>assets/themes/business/js/jquery-1.3.1.min.js"></script>
			<script type="text/javascript" src="<?php echo Kohana::$base_url ?>assets/themes/business/js/jquery.easing.1.3.js"></script>
			<script type="text/javascript" src="<?php echo Kohana::$base_url ?>assets/themes/business/js/jquery.ennui.contentslider.js"></script>
			<script type="text/javascript">
				$(function() {
				$('#one').ContentSlider({
				width : '610px',
				height : '260px',
				speed : 400,
				easing : 'easeOutSine',
				leftBtn: '<?php echo Kohana::$base_url ?>assets/themes/business/images/cs_leftImg.png',
				rightBtn: '<?php echo Kohana::$base_url ?>assets/themes/business/images/cs_rightImg.png'
				});
				});
			</script>
			<div class="cleaner"></div>
		</div> <!-- end of templatemo_slider -->  

		<h2>Business Website Template</h2>
		<p><a href="http://www.cssmoban.com" target="_parent">Business Template</a> is a full-site template with total 5 pages. Feel free to download, edit and apply this template for your commercial or personal websites. Credit goes to <a href="http://www.smashingmagazine.com" target="_blank">Smashing Magazine</a> for icons and <a href="#" target="_blank">Free Photos</a> for photos used in this template.</p>
		<p>In ac libero urna. Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero. Cras purus libero, dapibus nec rutrum in, dapibus nec risus. Ut interdum mi sit amet magna feugiat auctor.</p>  

		<div class="cleaner_h40"></div>

		<h2>Web Design Ideas</h2>

		<div class="service_box float_l">
			 
			 <div class="service_image">
				<img src="<?php echo Kohana::$base_url ?>assets/themes/business/images/icon_01.png" alt="image" />
			 </div>
			 <div class="service_text">
				 <h6>Great Tips</h6>
			   <p>Donec varius tempor hendrerit. Nam convallis est ut lacus ullamcorper vitae scelerisque enim lobortis. Nam ut ipsum nec magna facilisis auctor ut porttitor enim. </p>
				 <div class="button"><a href="services.html">More</a></div>
			 </div>
			 
		</div>

		<div class="service_box float_r">

			<div class="service_image">
				<img src="<?php echo Kohana::$base_url ?>assets/themes/business/images/icon_02.png" alt="image" />
			 </div>
			 <div class="service_text">
				 <h6>Optimizations</h6>
				 <p>Nunc sed pharetra dui. Donec malesuada rutrum imperdiet. Etiam nec risus sit amet diam malesuada dictum non vitae est. Vivamus ac odio eros.</p>
				 <div class="button"><a href="services.html">More</a></div>
			 </div>
			
		</div>
<?php echo View::factory('footer') ?>