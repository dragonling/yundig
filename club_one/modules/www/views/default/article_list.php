<?php echo View::factory('header'); ?>

<div class="main clearfix">
     <div class="left">
		<?php echo View::factory('left', array('catalog' => $catalog)); ?>
	 </div>
     <div class="medio">
          <div class="flow clearfix">
             <h1 class="chah1"><?php echo $catalog['title']; ?></h1>
              <div class="mu"><span>日期</span>標題</div>
				
				<?php foreach ($data as $k => $v) { ?>
				  <div class="link">
					   <div class="linktop clearfix">
							<dl class="linkdl">
								 <dt><?php echo date('Y-m-d', $v->post_time); ?></dt>
								 <dd><a href="<?php echo $v->link; ?>"><?php echo $v->title; ?></a></dd>
							</dl>
					   </div>
				  </div>
				<?php } ?>
		  </div>
     </div>
</div>


<?php echo View::factory('footer'); ?>