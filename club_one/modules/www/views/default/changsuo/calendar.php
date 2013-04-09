<?php /*無邊框詳情頁*/  ?>
<?php echo View::factory('header'); ?>

<div class="main clearfix">
	<?php foreach ($data['contents'] as $v) { ?>
	<?php echo $v->content; ?>
	<?php } ?>
</div>


<?php echo View::factory('footer'); ?>