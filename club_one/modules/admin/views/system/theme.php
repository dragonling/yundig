<?=View::factory('header')?>
<div class="container">
	<div class="content_box">
	<div class="content module_tabs">
	
		<?php foreach ($data as $m => $items) { ?>
		<div class="themes tab_content" id="<?php echo 'module_'.$m ?>">
		<h3><?php echo $m ?></h3>
		
		<?php foreach ($items as $k => $v) { ?>
		<div class="item <?php echo $v['selected'] === TRUE ? 'selected' : '' ?>">
			<a href="<?php echo URL::site('admin/system/theme/save').URL::query(array('m' => $m, 'v' => $k, 'language_id' => Common::language_id()))?>">
				<img src="<?php echo URL::base('http').$v['image'] ?>" width=280/>
			</a>
			<span><?php echo $v['name'].'--'.$v['author'] ?></span>
		</div>
		<?php } ?>
		<div class="clearfix"></div>
		</div>
		<?php } ?>
	</div>
	</div>
</div>
<script type='text/javascript'>
	//隔行换色
	$(".list_table tr::nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);
	
</script>

<?=View::factory('footer')?>