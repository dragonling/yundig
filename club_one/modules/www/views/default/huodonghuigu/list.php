<?php echo View::factory('header'); ?>

<div class="main clearfix">
     <div class="left">
          <ul class="sub">
			<?php foreach (Web::get_catalogs(43, (isset($catalog['id']) ? $catalog['id'] : 0), 'subxuan') as $nav) { ?>
			<li class="<?php echo $nav['class'] ?>">
				<a href="<?php echo $nav['link'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a>
			</li>
			<?php } ?>
          </ul>
     </div>
     <div class="medio">
          <div class="flow clearfix">
              <div class="flowmenu">
				<?php foreach (I18n::get('data_place_type', 'common') as $type => $type_name) { ?>
                   <dl class="menudl <?php echo $type == 1 ? 'menuclick' : '' ?>">
                        <dt><span><?php echo $type_name; ?></span></dt>
                        <dd class="hui">活動回顧</dd>
						<?php foreach ($data as $v) { ?>
						<?php if ($v->place_type == $type) { ?>
                        <dd><a href="<?php echo $v->link; ?>" title="<?php echo htmlentities($v->title); ?>"><?php echo date('m/d/Y', $v->post_time); ?> <?php echo $v->title; ?></a></dd>
						<?php 	} ?>
						<?php } ?>
                   </dl>
				<?php } ?>
              </div>
              <div class="flowpic"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/flowpic.jpg" width="470" height="390" /></div>
         </div>
     </div>
</div>


<?php echo View::factory('footer'); ?>