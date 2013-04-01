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
					<?php 
						$one_img = '';
						if (is_array($data['images'])) {
							foreach ($data['images'] as $v) {
								if ( ! empty($v)) {
									if ($one_img == '') $one_img = '<script>$(".pho img").attr("src", "'.$v['src'].'").fadeIn("500");</script>';
									echo '<li><a href="'.$v['src'].'"><img src="'.$v['src'].'_66x66.jpg" width="160" height="90" /></a></li>';
								}
							}
						}
						echo $one_img;
					?>
               </ul>
          </div>
     </div>
</div>


<?php echo View::factory('footer'); ?>