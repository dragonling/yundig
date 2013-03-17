<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>VLC 后台管理系统</title>
<meta name="description" content="Administry - Admin Template by Zoran Juric" />
<meta name="keywords" content="Admin,Template" />
<!-- We need to emulate IE7 only when we are to use excanvas -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<![endif]-->
<!-- Favicons -->
<link rel="shortcut icon" type="image/png" HREF="<?=Kohana::$base_url?>assets/admin/img/favicons/favicon.png"/>
<link rel="icon" type="image/png" HREF="<?=Kohana::$base_url?>assets/admin/img/favicons/favicon.png"/>
<link rel="apple-touch-icon" HREF="<?=Kohana::$base_url?>assets/admin/img/favicons/apple.png" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?=Kohana::$base_url?>assets/admin/css/style.css" type="text/css" />
<!-- Colour Schemes
Default colour scheme is blue. Uncomment prefered stylesheet to use it.
<link rel="stylesheet" href="css/brown.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/gray.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/green.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/pink.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/red.css" type="text/css" media="screen" />
-->
<!-- Your Custom Stylesheet -->
<link rel="stylesheet" href="<?=Kohana::$base_url?>assets/admin/css/custom.css" type="text/css" />
<!--swfobject - needed only if you require <video> tag support for older browsers -->
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/swfobject.js"></script>
<!-- jQuery with plugins -->
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/jquery-1.7.1.min.js"></script>
<!-- Could be loaded remotely from Google CDN : <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/jquery.ui.core.min.js"></script>
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/jquery.ui.tabs.min.js"></script>
<!-- jQuery tooltips -->
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/jquery.tipTip.min.js"></script>
<!-- Superfish navigation -->
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/jquery.superfish.min.js"></script>
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/jquery.supersubs.min.js"></script>
<!-- jQuery form validation -->
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/jquery.validate_pack.js"></script>
<!-- jQuery popup box -->
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/jquery.nyroModal.pack.js"></script>
<!-- jQuery graph plugins -->
<!-- jQuery data tables -->
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/jquery.dataTables.min.js"></script>

<!-- jQuery Fancy Box -->
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?=Kohana::$base_url?>assets/admin/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<!--[if IE]><script type="text/javascript" src="<?=Kohana::$base_url?>assets/admin/js/flot/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/js/flot/jquery.flot.min.js"></script>
<!-- Internet Explorer Fixes -->
<!--[if IE]>
<link rel="stylesheet" type="text/css" media="all" href="css/ie.css"/>
<script src="<?=Kohana::$base_url?>assets/admin/js/html5.js"></script>
<![endif]-->
<!--Upgrade MSIE5.5-7 to be compatible with MSIE8: http://ie7-js.googlecode.com/svn/version/2.1(beta3)/IE8.js -->
<!--[if lt IE 8]>
<script src="<?=Kohana::$base_url?>assets/admin/js/IE8.js"></script>
<![endif]-->
<script>
var current;
$(function(){

$("a[target=_ajax]").fancybox();

$("a[target=_iframe]").fancybox({

				'width'				: '75%',

				'height'			: '75%',

				'autoScale'			: false,

				'transitionIn'		: 'none',

				'transitionOut'		: 'none',

				'type'				: 'iframe'

			});


$(".toggle").fancybox({
			onComplete:function(data,a,c){
			var test = c;
			toggle_on  = "<?=Kohana::$base_url?>assets/admin/img/accept.png";
			toggle_off = "<?=Kohana::$base_url?>assets/admin/img/delete.png";
			cur_img = $("#"+current).attr('src');
			if(!current) return false;
			if(cur_img == toggle_on){
				$("#"+current).attr('src',toggle_off)
			}
			else if(cur_img == toggle_off){
				$("#"+current).attr('src',toggle_on)
			}

			}
		});

});

//toggle action
var currentToggle = function(currentID){

	current = currentID;
}
</script>
</head>
<body>

	<!-- Page title -->
	<div id="pagetitle">
		<?if(isset($title)):?>
		<div class="wrapper">
			<h1><?=$title?></h1>
			<!-- Quick search box -->
			<form action="" method="get"><input class="" type="text" id="q" name="q" /></form>
		</div>
		<?endif;?>
	</div>
<!-- End of Page title -->