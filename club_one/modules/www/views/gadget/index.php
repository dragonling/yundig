<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title . ' - ' . Web::config('name')?></title>
<meta name="keywords" content="<?php echo Web::config('keywords') ?>" />
<meta name="description" content="<?php echo Web::config('description') ?>" />

<link rel="stylesheet" type="text/css" href="<?php echo URL::base('http') ?>assets/themes/gadget/templatemo_style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo URL::base('http') ?>assets/themes/gadget/styles/styles.css" />
<script language="javascript" type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/gadget/scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/gadget/scripts/mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/gadget/scripts/slideitmoo-1.1.js"></script>
<script language="javascript" type="text/javascript">
	window.addEvents({
		'domready': function(){
			/* thumbnails example , div containers */
			new SlideItMoo({
						overallContainer: 'SlideItMoo_outer',
						elementScrolled: 'SlideItMoo_inner',
						thumbsContainer: 'SlideItMoo_items',		
						itemsVisible: 5,
						elemsSlide: 3,
						duration:300,
						itemsSelector: '.SlideItMoo_element',
						itemWidth: 158,
						showControls:1});
		},
		
	});

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>
<body>

<div id="templatemo_site_title_bar_wrapper">

	<div id="templatemo_site_title_bar">
    
    	<div id="site_title">
            <h1><a href="http://www.cssmoban.com" target="_parent">
                <!--
                Gadget Website
                <span>free css template</span>
                -->
                <img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_logo.png" alt="Gadget Site" /><span>free css template</span>
            </a></h1>
        </div>
        
        <div id="search_box">
            <form action="#" method="get">
                <input type="text" value="Enter keyword here..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" />
            </form>
        </div>
        
        <div id="templatemo_menu">
                <ul>
				  <?php 
					$h_catalog = Web::get_catalog('header');
					for ($k = 0, $count = count($h_catalog); $k < $count; $k++) {
					$class = ($k == 0 ? 'first' : ($k+1 == $count ? 'last' : ''));
					$nav = $h_catalog[$k];
				  ?>
				  <li><a href="<?php echo $nav['link'] ?>" class="<?php echo ($nav['current_controller'] == $self->request->controller()) ? 'current' : '' ?> <?php echo $class ?>" target="<?php echo $nav['target'] ?>"><span></span><?php echo $nav['title'] ?></a></li>
				  <?php } ?>
          		</ul>
		</div> <!-- end of menu -->
    
    </div>
    
</div>

<div id="templatemo_content">

	<div id="product_gallery">
    
    	<div id="SlideItMoo_outer">	
		<div id="SlideItMoo_inner">			
			<div id="SlideItMoo_items">
				<div class="SlideItMoo_element">
                	<strong>Product 1</strong>
                    	<a href="#">
                    	<img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_product_01.png" alt="mouse" /></a>
                   
                </div>	
				<div class="SlideItMoo_element">
                	<strong>Product 2</strong>
                    	<a href="#">
                    	<img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_product_02.png" alt="product 2" /></a>

                </div>
				<div class="SlideItMoo_element">
                	<strong>Product 3</strong>
                    	<a href="#">
                    	<img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_product_03.png" alt="product 3" /></a>

                </div>
				<div class="SlideItMoo_element">
                	<strong>Product 4</strong>
                    	<a href="#">
                    	<img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_product_04.png" alt="earphone" /></a>

                </div>
				<div class="SlideItMoo_element">
                	<strong>Product 5</strong>
                    	<a href="#">
                    	<img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_product_05.png" alt="graphics card" /></a>

                </div>
				<div class="SlideItMoo_element">
                	<strong>Product 6</strong>
                    	<a href="#">
                    	<img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_product_06.png" alt="product 6" /></a>

                </div>
				<div class="SlideItMoo_element">
                	<strong>Product 7</strong>
                    	<a href="#">
                    	<img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_product_07.png" alt="product 7" /></a>
                </div>
                <div class="SlideItMoo_element">
                	<strong>Product 8</strong>
                    	<a href="#">
                    	<img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_product_08.png" alt="product 8" /></a>
                </div>
			</div>			
		</div>
	</div>
    
    </div> <!-- end of product gallery -->
    
    <div class="section_w940">
    
    	<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
        <p>This CSS template is provided by <a href="http://www.cssmoban.com" target="_parent">网页模板</a> for free of charge. Feel free to download, modify and apply this template for your websites. Credit goes to <a href="http://www.webappers.com/2008/05/20/148-vector-icons-for-personal-and-commercial-use/" target="_blank">webappers.com</a> for icons used in this template. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend ornare ipsum, eu tincidunt nunc pulvinar tincidunt. Integer vel erat purus, quis pulvinar metus. Phasellus sed orci eros.</p>
    	
  </div>
    
    <div class="cleaner_h30"></div>
    
    <div class="section_w940">
    	
        <div class="section_w440 margin_r_20">
        	<div class="rounded_top"><span></span></div>
            
<div class="sub_content">
                
                <h2>Gadget Trends</h2>
                
                <p>Nullam ultrices tempor nisi, ac egestas diam aliquam a. Ut eleifend semper turpis, id feugiat arcu dignissim eu.</p>
                
                <ul class="service_list">
                	<li><a href="#">Cras elementum dignissim rhoncus</a></li>
                  <li><a href="#">Nullam sem nisi, ullamcorper non ultrices sed</a></li>
                  <li><a href="#">Fusce mi augue, lobortis eu faucibus sit ame</a>t</li>
                  <li><a href="#">In eros erat, sodales congue luctus non</a></li>
                  <li><a href="#">Curabitur laoreet, lacus vitae iaculis varius</a></li>
        </ul>
                
            </div>
            
           <div class="rounded_bottom"><span></span></div>       
      </div>
        
        <div class="section_w210 margin_r_20">
        	<div class="rounded_top"><span></span></div>
            
<div class="sub_content">
                
                <h2>New Gadget</h2>
                
                <center>
                <img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_product_05.png" alt="latest product" />
                </center>
                
                <p>Maecenas nec nisl at metus fermentum varius nec faucibus tortor.</p>
                
                <div class="button button_01"><a href="#">View</a></div>
                                
            </div>
            
           <div class="rounded_bottom"><span></span></div>       
      </div>
        
        <div class="section_w210">
        	<div class="rounded_top"><span></span></div>
            
<div class="sub_content">
                
                <h2>Hot News</h2>
                
                <h3>Vivamus sit amet</h3>                
                <p>Aenean scelerisque, enim sit amet hendrerit egestas, augue felis fringilla odio, quis commodo nisl tortor sed orci.</p>
                
                <div class="button button_01"><a href="#">View</a></div>
                
                                
            </div>
            
           <div class="rounded_bottom"><span></span></div>       
      </div>
    
    </div> <!-- end of a section_w940 --> 
    
    <div class="cleaner"></div>
    
</div>

<div id="templatemo_footer_wrapper">

	<div id="templatemo_footer">
    
    	<div class="section_w210 margin_r_20">
        	
            <div class="h3_01"><h3>Partners</h3></div>
            
            <div class="sub_content">
            	
                <ul class="footer_list">
                    <li><a href="http://www.cssmoban.com" target="_parent">CSS Templates</a></li>
                    <li><a href="#" target="_parent">Flash Templates</a></li>
                    <li><a href="#/blog" target="_blank">Web Design Resources</a></li>
                    <li><a href="#" target="_blank">Flash Websites Gallery</a></li>               
                </ul>
                
            </div>
            
        </div>
        
        <div class="section_w210 margin_r_20">
        	
            <div class="h3_02">
              <h3>About Us</h3>
            </div>
            
            <div class="sub_content">
            
                <ul class="footer_list">
                	<li><a href="#">Lorem ipsum dolor</a></li>
                    <li><a href="#">Cum sociis</a></li>
                    <li><a href="#">Donec quam</a></li>
                    <li><a href="#">Nulla consequat</a></li>
                    <li><a href="#">In enim justo</a></li>
                </ul>
            
            </div>
            
        </div>
        
        <div class="section_w210 margin_r_20">
        	
            <div class="h3_03"><h3>Customer Care</h3></div>
            
            <div class="sub_content">
            
            	<ul class="footer_list">
                
                    <li><a href="#">Aenean vulputate</a></li>
                    <li><a href="#">Etiam ultricies</a></li>
                    <li><a href="#">Nullam quis</a></li>
                    <li><a href="#">Sed consequat</a></li>
                    <li><a href="#">Cras dapibus</a></li>    
        		</ul>
            </div>
                
        </div>
        
        <div class="section_w210">
        	
            <div class="h3_04"><h3>Privacy Policy</h3></div>
            
            <div class="sub_content">
            	<p>Nullam ultrices tempor nisi, ac egestas diam aliquam a. Ut eleifend semper turpis, id feugiat arcu dignissim eu. Donec mattis adipiscing imperdiet.</p>
            </div>
            
        </div>
        
        <div class="cleaner_h40"></div>
  
        <center>
        	Copyright © 2048 <a href="#">Your Company Name</a> | 
            from <a href="http://www.cssmoban.com" target="_parent">网站模板</a> | 
            Validate <a href="http://validator.w3.org/check?uri=referer">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
        </center>
    	
    </div>
	<div class="cleaner"></div>
</div>
</body>
</html>