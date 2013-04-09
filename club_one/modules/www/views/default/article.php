<?php echo View::factory('header'); ?>
<style>.tudate span{height:16px;line-height:16px;}</style>
<div class="main clearfix">
     <div class="left">
		<?php echo View::factory('left', array('catalog' => $catalog)); ?>     </div>
     <div class="medio">
          <div class="flow clearfix">
			 <p class="tuh1 news"><?php echo $catalog['title']; ?></p>
			 <h1 class="tutitle"><?php echo $data['title'] ?></h1>
			 <div class="tudate"><span><?php echo View::factory('add_this'); ?></span>日期：<?php echo date('Y-m-d', $data['post_time']); ?></div>
          
				<div class="tutxt">
					<?php
						if ($data['maps'] != '')
						{
							$maps = unserialize($data['maps']);
							if (is_array($maps)) echo View::factory('google_map', array('maps' => $maps));
						}
					?>
					<?php foreach ($data['contents'] as $v) { ?>
					<?php echo $v->content; ?>
					<?php } ?>
				</div>
               <div class="return"><a href="<?php echo $catalog['link']; ?>"></a></div>
		  </div>
     </div>
</div>


<?php echo View::factory('footer'); ?>