<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo I18n::get('text_admin_system', 'common') ?></title>
<!-- Favicons -->
<link rel="shortcut icon" type="image/png" HREF="<?php echo Kohana::$base_url ?>assets/admin/images/favicon.ico"/>
<link rel="icon" type="image/png" HREF="<?php echo Kohana::$base_url ?>assets/admin/images/favicon.ico"/>
<link rel="apple-touch-icon" HREF="<?php echo Kohana::$base_url ?>assets/admin/images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo Kohana::$base_url ?>assets/admin/stylesheet/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Kohana::$base_url?>assets/admin/javascript/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/jquery-1.7.1.min.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/jquery.validate.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/artDialog4.1.6/artDialog.source.js?skin=default"></script>
<script src="<?php echo Kohana::$base_url ?>assets/admin/artDialog4.1.6/plugins/iframeTools.source.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/common.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/menu.js"></script>
<script type="text/javascript" SRC="<?php echo Kohana::$base_url?>assets/admin/javascript/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" SRC="<?php echo Kohana::$base_url?>assets/admin/javascript/fancybox/jquery.fancybox-1.3.4.js"></script>

<script>
var base_url = '<?php echo URL::site() ?>';
var current;
$(function(){

$("a[target=_window]").bind('click', function() {
	alert(this.href);
});

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
			toggle_on  = "<?php echo Kohana::$base_url ?>assets/admin/img/accept.png";
			toggle_off = "<?php echo Kohana::$base_url ?>assets/admin/img/delete.png";
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
<body class="folden">
	<!-- Header -->
	<header id="top">
		<div id="header">
			<div class="logo">
				<a href="<?php echo Kohana::$base_url ?>"><img src="<?php echo Kohana::$base_url ?>assets/admin/images/logo.gif" width="303" height="43" /></a>
			</div>
			<div id="menu">
				<ul name="menu">
					<?php foreach (Controller_Admin::menu() as $k => $v) {?>
					<li onclick="select_menu($(this))">
						<a hideFocus="true" onclick="loadSubMenus(<?php echo $v->id ?>);
open_window(6, '<?php echo $v->name ?>', '<?php echo (trim($v->right) == '' || $v->type == 1) ? '' : (strpos($v->right, 'javascript:') === FALSE ? URL::site($v->right) : $v->right) ?>')" href="javascript:;"><?php echo $v->name ?></a>
					</li>
					<?php } ?>
				</ul>
			</div>
			<p>
				<div class="f_r">
				<form action='<?php echo URL::site('admin/common/main/change_language')?>' method="get">
					<?php echo $languages; ?>
				</form>
				</div>
				<div class="f_r" style="line-height:25px;">
					<span><?php echo __(I18n::get('text_greetings', 'common'), array(':username' => Auth::instance()->get_user()->username, ':role_name' => Auth::instance()->get_role(Common::language_id())->name)) ?></span>
					&nbsp;&nbsp;					
					<a href="<?php echo URL::site('admin/common/main/logout') ?>"><?php echo I18n::get('text_logout', 'login'); ?></a> |
					<a href="/" target='_blank'><?php echo I18n::get('text_home', 'common'); ?></a> 
					&nbsp;&nbsp;
				</div>
			</p>
		</div>
	</header>
	<!-- End of Header -->
	<div id="admin_left">
		<ul class="submenu">
		</ul>
		<div id="copyright">
			<p>Copyright &copy; 2012 <a href="http://www.konashop.net"><b>Kona Shop</b></a> </p>
		</div>
	</div>
	<div id="admin_right">
		<div id="info_bar">
			<span id="nav_0" class="nav_sec selected" alt="1">
				<label onclick="switch_window(0)" href="javascript:;"><?php echo I18n::get('text_home', 'common'); ?></label>
				<a class="close" onclick="close_window(0)" href="javascript:;">x</a>
			</span>
			<div id="controller_block" class="f_r">
				<a id="full_button" href="javascript:;" onclick="$('#admin_right').toggleClass('full_window')"></a>
			</div>
			
		</div>
		<div id="windows">
			<iframe id="frame_0" src="<?php echo URL::site('admin/dashboard/main/home') ?>" scrolling="auto" style="width:100%;height:100%;" frameborder="0"></iframe>
			
		</div>
	</div><!-- Page footer -->
	<div id="separator"></div>
	
	<script type='text/javascript'>
		// Close or open left menus
		$("#separator").click(function(){
				document.body.className = (document.body.className == "folden") ? "":"folden";
			}
		);
		// onclick top menu abs open left menus
		$("#menu li").click(function(){
				document.body.className = "";
			}
		);
		
	</script>
</body>
</html>