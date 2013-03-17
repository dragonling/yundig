<?php echo View::factory('header') ?>    
    <style>
		.data_table{width:100%;}
		.data_table td{border-bottom:1px dashed #ccc}
	</style>
	<div style="width:100%">
		<?php foreach ($data['contents'] as $v) : ?>
		<?php echo $v->content; ?>
		<?php endforeach; ?>
	</div>
<?php echo View::factory('footer') ?>