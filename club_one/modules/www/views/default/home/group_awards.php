<?php echo View::factory('header'); ?>

<div class="main clearfix">
     <div class="left">
		<?php echo View::factory('home/left', array('catalog' => $catalog)); ?>     </div>
     <div class="medio">
          <div class="flow clearfix">
             <h1 class="chah1">集團獎項</h1>
              <div class="mu"><span>日期</span>榮譽項目</div>
				
				<?php foreach ($data as $k => $v) { ?>
				  <div class="link <?php echo $k == 0 ? 'linkxuan' : ''; ?>">
					   <div class="linktop clearfix">
							<dl class="linkdl">
								 <dt><?php echo date('Y-m-d', $v->post_time); ?></dt>
								 <dd><a href="javascript:;" class="add"></a><?php echo $v->title; ?></dd>
							</dl>
					   </div>
					   <div class="linkcon clearfix">
						   <dl class="linkpic">
								 <dt><img src="<?php echo $v->thumb; ?>" width="75" height="50" /></dt>
								 <dd><?php echo $v->desc; ?></dd>
							</dl>
					   </div>
				  </div>
				<?php } ?>
		  </div>
     </div>
</div>


<?php echo View::factory('footer'); ?>