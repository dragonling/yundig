<?php echo View::factory('header') ?>

<div class="center_content">
<div class="left_content">
	<div class="crumb_nav">
	<a href="<?php echo URL::base('http') ?>">home</a> &gt;&gt; <a href="<?php echo Web::url('articles', $catalog['rewrite_url'], $catalog['id']) ?>"><?php echo $catalog['title']; ?></a> &gt;&gt; <?php echo $data['title']; ?>
	</div>
	<div class="title" style="width:100%">	<?php echo $data['title']; ?></div>
   
	<div>
	<?php foreach ($data['contents'] as $v) : ?>
	<?php echo $v->content; ?>
	<?php endforeach; ?>
	</div>
</div><!--end of left content-->

<?php echo View::factory('righter') ?>


<div class="clear"></div>
</div><!--end of center content-->

	  

<?php echo View::factory('footer') ?>