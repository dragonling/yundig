<?php echo View::factory('header'); ?>

<div class="main clearfix">
     <?php 
		//left
		echo View::factory('changsuo/left', array('cat' => $catalog['id'], 'id' => $data['id']));
	 ?>
     <div class="right">
          <ul class="menu">
			<?php foreach (Web::get_catalogs($catalog['parent_id'], (isset($catalog['id']) ? $catalog['id'] : 0), 'menuxuan') as $k => $nav) { ?>
			<li class="<?php echo $nav['class'] ?>"><?php echo $k > 0 ? '·' : ''; ?>
				<a href="<?php echo $nav['link'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a>
			</li>
			<?php } ?>
          </ul>
          <div class="pho">
              <img src="<?php echo URL::base('http') ?>assets/themes/default/images/003.jpg" width="800" height="450" />
          </div>
          <div class="gundong">
               <a href="#" class="mprve"></a>
               <a href="#" class="mnext"></a>
               <ul class="gunul">
                    <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/004.jpg" width="160" height="90" /></a></li>
                    <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/004.jpg" width="160" height="90" /></a></li>
                    <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/004.jpg" width="160" height="90" /></a></li>
                    <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/004.jpg" width="160" height="90" /></a></li>
               </ul>
          </div>
     </div>
</div>


<?php echo View::factory('footer'); ?>