<?php echo View::factory('header'); ?>

<div class="main clearfix">
     <?php 
		//left
		echo View::factory('changsuo/left', array('cat' => $catalog['id'], 'id' => $data['id']));
	 ?>
     <div class="right">
          <ul class="menu">
               <li><a href="#">九龍半山</a></li>
               <li>·<a href="#">九龍東</a></li>
               <li>·<a href="#">大舞臺</a></li>
               <li class="menuxuan">·<a href="#">銀灘</a></li>
               <li>·<a href="#">博藝會</a></li>
               <li>·<a href="#">德藝會</a></li>
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