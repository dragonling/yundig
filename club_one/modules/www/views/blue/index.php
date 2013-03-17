﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $title . ' - ' . Web::config('name')?></title>
<meta name="keywords" content="<?php echo Web::config('keywords') ?>" />
<meta name="description" content="<?php echo Web::config('description') ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="description" content="Home page - free business website template available at TemplateMonster.com for free download."/>
<link href="<?php echo URL::base('http') ?>assets/themes/blue/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URL::base('http') ?>assets/themes/blue/layout.css" rel="stylesheet" type="text/css" />
<script src="<?php echo URL::base('http') ?>assets/themes/blue/maxheight.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<link href="ie_style.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>

<body id="page1" onload="new ElementMaxHeight();">
   <!-- header -->
   <div id="header">
      <div class="container">
         <div class="row-1">
            <div class="logo"><a href="/"><img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/logo.jpg" /></a></div>
            <ul class="top-links">
               <li><a href="/"><img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/top-icon1.jpg" /></a></li>
               <li><a href="#"><img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/top-icon2.jpg" /></a></li>
               <li><a href="contactus"><img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/top-icon3.jpg" /></a></li>
            </ul>
         </div>
         <div class="row-2">
         	<!-- nav box begin -->
            <div class="nav-box">
            	<div class="left">
               	<div class="right">
                  	<ul>
						<?php 
							$h_catalog = Web::get_catalog('header');
							for ($k = 0, $count = count($h_catalog); $k < $count; $k++)
							{
								$class = ($k == 0 ? 'first-current' : ($k+1 == $count ? 'last' : ''));
								$nav = $h_catalog[$k];
						?>
						<li><a href="<?php echo $nav['link'] ?>" class="<?php echo ($nav['current_controller'] == $self->request->controller()) ? 'current' : '' ?> <?php echo $class ?>" target="<?php echo $nav['target'] ?>"><em><b><?php echo $nav['title'] ?></em></b></a></li>
						<?php } ?>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- nav box end -->
         </div>
      </div>
   </div>
   <!-- content -->
   <div id="content">
      <div class="container">
      	<!-- main-banner-big begin -->
         <div class="main-banner-big">
         	<div class="inner">
            	<h1>Even the biggest success Starts with a first step</h1>
               <a href="#" class="button">Learn More</a>
            </div>
         </div>
         <!-- main-banner-big end -->
         <div class="wrapper">
         	<div class="col-1 maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
                  <div class="border-top maxheight">
                     <div class="border-right maxheight">
                        <div class="border-bot maxheight">
                           <div class="border-left maxheight">
                              <div class="left-top-corner maxheight">
                                 <div class="right-top-corner maxheight">
                                    <div class="right-bot-corner maxheight">
                                       <div class="left-bot-corner maxheight">
                                          <div class="inner">
                                             <h2>News Headlines</h2>
                                             <ul class="list1">
                                             	<li>
                                                   <p>BigBiz LLC announces a partnership with Clayton-Roberts - the leading financial consulting player.</p>
                                                   <a href="#">Read More</a>
                                                </li>
                                                <li>
                                                   <p>BigBiz LLC announces some other kind of thing, not necessarily a partnership.</p>
                                                   <a href="#">Read More</a>
                                                </li>
                                                <li>
                                                   <p>The third news item is usually not even being read.</p>
                                                   <a href="#">Read More</a>
                                                </li>
                                                <li>
                                                   <p>However these news items look so awesome.</p>
                                                   <a href="#">Read More</a>
                                                </li>
                                                <li>
                                                   <p>There’s no way  we could ignore them - so here they are.</p>
                                                   <a href="#">Read More</a>
                                                </li>
                                             </ul>
                                             <a href="#" class="button"><em><b>GO TO NEWS SECTION</b></em></a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- box end -->
            </div>
            <div class="col-2 maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
                  <div class="border-top maxheight">
                     <div class="border-right maxheight">
                        <div class="border-bot maxheight">
                           <div class="border-left maxheight">
                              <div class="left-top-corner maxheight">
                                 <div class="right-top-corner maxheight">
                                    <div class="right-bot-corner maxheight">
                                       <div class="left-bot-corner maxheight">
                                          <div class="inner">
                                             <h2>Our Team</h2>
                                             <ul class="list2">
                                             	<li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_66x66.gif" />
                                                   <h5>John Doe</h5>
                                                   President or something
                                                </li>
                                                <li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_66x66.gif" />
                                                   <h5>Jane Doe</h5>
                                                   Assistant President
                                                </li>
                                                <li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_66x66.gif" />
                                                   <h5>Sam Cohen</h5>
                                                   Financial Vice President
                                                </li>
                                                <li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_66x66.gif" />
                                                   <h5>Jebediah Ray Tergesen</h5>
                                                   Whatever, farmer perhaps
                                                </li>
                                                <li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_66x66.gif" />
                                                   <h5>John Doe</h5>
                                                   President or something
                                                </li>
                                             </ul>
                                             <a href="#" class="button"><em><b>The Rest of Team</b></em></a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- box end -->
            </div>
            <div class="col-3 maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
                  <div class="border-top maxheight">
                     <div class="border-right maxheight">
                        <div class="border-bot maxheight">
                           <div class="border-left maxheight">
                              <div class="left-top-corner maxheight">
                                 <div class="right-top-corner maxheight">
                                    <div class="right-bot-corner maxheight">
                                       <div class="left-bot-corner maxheight">
                                          <div class="inner">
                                             <h2>Featured Partners</h2>
                                             <ul class="list2">
                                             	<li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_51x51.gif" />
                                                   <h6><a href="#">Dooodle Inc.</a></h6>
                                                </li>
                                                <li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_51x51.gif" />
                                                   <h6><a href="#">Macrohard</a></h6>
                                                </li>
                                                <li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_51x51.gif" />
                                                   <h6><a href="#">A-bode</a></h6>
                                                </li>
                                                <li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_51x51.gif" />
                                                   <h6><a href="http://www.templatemonster.com" target="_blank">TemplateMonster.com</a> - Why not?</h6>
                                                </li>
                                                <li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_51x51.gif" />
                                                   <h6><a href="#">GoMommy</a></h6>
                                                </li>
                                                <li>
                                                	<img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_51x51.gif" />
                                                   <h6><a href="#">Lola-cola</a></h6>
                                                </li>
                                             </ul>
                                             <a href="#" class="button"><em><b>View All Partners</b></em></a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- box end -->
            </div>
         </div>
      </div>
   </div>
   <!-- extra-content -->
   <div id="extra-content">
     	<div class="container">
      	<div class="wrapper">
         	<div class="col-1 maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
                  <div class="border-top maxheight">
                     <div class="border-right maxheight">
                        <div class="border-bot maxheight">
                           <div class="border-left maxheight">
                              <div class="left-top-corner maxheight">
                                 <div class="right-top-corner maxheight">
                                    <div class="right-bot-corner maxheight">
                                       <div class="left-bot-corner maxheight">
                                          <div class="inner">
                                             <h2>About Us</h2>
                                             <img class="img-indent" alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_87x66.gif" />
                                             A perfect place to tell a couple of words about your company - just a little bit of introduction, leave the rest for a proper page.
                                             <div class="clear"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- box end -->
            </div>
            <div class="col-2 maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
                  <div class="border-top maxheight">
                     <div class="border-right maxheight">
                        <div class="border-bot maxheight">
                           <div class="border-left maxheight">
                              <div class="left-top-corner maxheight">
                                 <div class="right-top-corner maxheight">
                                    <div class="right-bot-corner maxheight">
                                       <div class="left-bot-corner maxheight">
                                          <div class="inner">
                                             <h2>Testimonial</h2>
                                             <img class="img-indent" alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/image_87x66.gif" />
                                             <h5>Testimonial Name</h5>
                                             We know you love it - showing off how your customers love you and your company. Therefore there should be a place for it - which is here.
                                             <div class="clear"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- box end -->
            </div>
         </div>
      </div> 
   </div>
   <!-- footer -->
   <div id="footer">
   	<div class="container">
      	<ul class="nav">
         	<li><a href="index.html">Home</a>|</li>
            <li><a href="about-us.html">About Us</a>|</li>
            <li><a href="solutions.html">Solutions</a>|</li>
            <li><a href="partners.html">Partners</a>|</li>
            <li><a href="consulting.html">Consulting</a>|</li>
            <li><a href="contact-us.html">Contact Us</a></li>
         </ul>
         <div class="wrapper">
         	<div class="fleft">Copyright &copy; 2009</div>
            <div class="fright"><a href="http://www.cssmoban.com/flash-templates.php">Flash Templates</a> from TemplateMonster - Squeeze Your Competitors.</div>
         </div>
      </div>
   </div>
</body>
</html>