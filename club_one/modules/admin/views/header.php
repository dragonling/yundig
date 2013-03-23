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
<link rel="stylesheet" href="<?php echo Kohana::$base_url ?>assets/admin/stylesheet/jquery-ui-timepicker-addon.css" />
<!--<link rel="stylesheet" href="<?php echo Kohana::$base_url ?>assets/admin/artdialog/skin/default.css" />-->
<link rel="stylesheet" href="<?php echo Kohana::$base_url ?>assets/jquery/ui/css/custom-theme/jquery-ui-1.9.0.custom.min.css" />

<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/jquery-1.7.1.min.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/jquery.validate.js"></script>
<script  type='text/javascript'src="<?php echo Kohana::$base_url ?>assets/jquery/ui/js/jquery-ui-1.9.0.custom.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/jquery-ui-timepicker-addon.js"></script>
<!--<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/artdialog/artdialog.min.js"></script>-->
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/artDialog4.1.6/artDialog.source.js?skin=default"></script>
<script src="<?php echo Kohana::$base_url ?>assets/admin/artDialog4.1.6/plugins/iframeTools.source.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/common.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/admin.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/menu.js"></script>

<script type="text/javascript" src="<?php echo Kohana::$base_url?>assets/admin/javascript/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo Kohana::$base_url?>assets/admin/javascript/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Kohana::$base_url?>assets/admin/javascript/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<style> .tree_root td { color:rgb(247, 120, 4); font-weight:bold;} </style>
<script>
	var btn_append  = '<?php echo I18n::get('btn_append', 'common') ?>';
	var btn_edit    = '<?php echo I18n::get('btn_edit', 'common') ?>';
	var text_append = '<?php echo I18n::get('text_append', 'common') ?>';
	var text_edit   = '<?php echo I18n::get('text_edit', 'common') ?>';
	var btn_save    = '<?php echo I18n::get('btn_save', 'common') ?>';
	var btn_close   = '<?php echo I18n::get('btn_close', 'common') ?>';

	var base_url   = '<?php echo Kohana::$base_url?>';
	var selfWin    = this;
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
				toggle_on  = "<?php echo Kohana::$base_url ?>assets/admin/images/right.gif";
				toggle_off = "<?php echo Kohana::$base_url ?>assets/admin/images/wrong.gif";
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
	var close = function(){
		$(".width6").addClass("width8");
		$("#datalist").css({"width":"990px"});
		$(".width2").hide();
		}

	//toggle action
	var currentToggle = function(currentID){

		current = currentID;
	}

<?php if (isset($message)) echo 'alert("'.$message.'");' ?>
</script>
</head>
<body>
	<div class="location">
		<?php //echo ! empty($location) ? View::factory('widget/location', $location) : '';?>
		<?php echo ! empty($tabs) ? View::factory('widget/tab') : '';?>
	</div>