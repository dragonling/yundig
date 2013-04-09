<?php echo View::factory('header'); ?>
<?php
	$articles = Web::get_articles($catalog['id'], 1, 5, 0, 1);
	$articles = $articles['items'];
	
?>

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
              <div class="activleft" id="tupic"><img src="images/010.jpg" width="320" height="390" /></div>
              <div class="activright">
                   <h1 class="tuh1">活動回顧</h1>
                   <div class="activcon">
						<?php foreach ($data['contents'] as $v) { ?>
						<?php echo $v->content; ?>
						<?php } ?>
				   </div>
                   <ul class="tab">
                       <li class="fenxiang">
					   </li>
                       <li class="xian tabxuan"><a href="#">相    片</a></li>
                       <li class="xian"><a href="#">影    片</a></li>
                   </ul>
                   <div class="activ">
                        <ul class="activul">
							<?php 
								$one_img = '';
								if (is_array($data['images'])) {
									foreach ($data['images'] as $v) {
										if ( ! empty($v)) {
											if ($one_img == '') $one_img = '<script>$("#tupic img").attr("src", "'.$v['src'].'").fadeIn("500");</script>';
											echo '<li><a href="#"><img src="'.$v['src'].'_66x66.jpg" width="80" height="100" /></a></li>';
										}
									}
								}
								echo $one_img;
							?>
                        </ul>
                        <ul class="activul">
							<?php 
								if (is_array($data['videos'])) {
									foreach ($data['videos'] as $v) {
										if ( ! empty($v)) {
											if ($one_img == '') $one_img = '<script>$("#tupic img").attr("src", "'.$v['src'].'").fadeIn("500");</script>';
											echo '<li><a href="#"><img src="'.$v['src'].'_66x66.jpg" width="80" height="100" /></a></li>';
										}
									}
								}
							?>
                        </ul>
                   </div>
              </div>
         </div>
     </div>
</div>


<?php echo View::factory('footer'); ?>