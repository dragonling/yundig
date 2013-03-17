<?php echo View::factory('header') ?>

<div class="center_content">
<div class="left_content">
    <div class="title">	<?php echo $catalog['title']; ?></div> 
    <div class="clear"></div>  
	<div>
	<?php 
		$article = Web::get_article($data[0]->id);
	?>
	<?php foreach ($article['contents'] as $v) : ?>
	<?php echo $v->content; ?>
	<?php endforeach; ?>
	</div>
</div><!--end of left content-->

<?php echo View::factory('righter') ?>


<div class="clear"></div>
</div><!--end of center content-->

	  

<?php echo View::factory('footer') ?>