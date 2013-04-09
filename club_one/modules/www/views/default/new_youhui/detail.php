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
              <div class="tupian">
                   <div class="tupic" id="tupic"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/009.jpg" width="300" height="300" style="display:none"/></div>
                   <ul class="tuul">
					<?php 
						$one_img = '';
						if (is_array($data['images'])) {
							foreach ($data['images'] as $v) {
								if ( ! empty($v)) {
									if ($one_img == '') $one_img = '<script>$("#tupic img").attr("src", "'.$v['src'].'").fadeIn("500");</script>';
									echo '<li><a href="#"><img src="'.$v['src'].'_66x66.jpg" width="66" height="66" /></a></li>';
								}
							}
						}
						echo $one_img;
					?>
                   </ul>
              </div>
              <div class="tucon">
                   <h1 class="tuh1">最新優惠</h1>
                   <div class="share"><?php echo View::factory('add_this'); ?></div>
                   <div class="tutitle"><?php echo $data['title']; ?></div>
                   <div class="tudate">
				   <?php if ($data['attach'] != '') { ?>
				   <span>文件下載：<a href="<?php echo $data['attach'] ?>"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/pdf.gif" width="16" height="16" /></a></span>
				   <?php } ?>
				   日期：<?php echo date('Y-m-d', $data['post_time']); ?></div>
                   <div class="tutxt">
						<?php foreach ($data['contents'] as $v) { ?>
						<?php echo $v->content; ?>
						<?php } ?>
					</div>
                   <div class="return"><a href="<?php echo Web::url('articles', $catalog['rewrite_url'], $catalog['id']) ?>"></a></div>
                   <dl class="menudl menuclick">
                        <dd class="hui">最新優惠</dd>
						<?php foreach ($articles as $v) { ?>
						<dd><a href="<?php echo $v->link; ?>" title="<?php echo htmlentities($v->title); ?>">[<?php echo $v->place_type_name; ?>] <?php echo date('m/d/Y', $v->post_time); ?> <?php echo $v->title; ?></a></dd>
						<?php } ?>
                   </dl>
              </div>
         </div>
     </div>
</div>


<?php echo View::factory('footer'); ?>