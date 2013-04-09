<?php echo View::factory('header'); ?>
<div class="note">
     <ul class="noteul">
	   <?php foreach ($new_mesag as $v) { ?>
	   <li><a href="<?php echo $v->link; ?>" title="<?php echo htmlentities($v->title); ?>">[<?php echo $v->place_type_name; ?>] <?php echo date('m/d/Y', $v->post_time); ?> <?php echo $v->title; ?></a></li>
	   <?php } ?>
     </ul>
</div>
<div id="slides" class="focus">
    <div class="slides_container">
		
		<?php foreach (Web::get_carousel(1) as $v): ?>
		<div>
            <a href="<?php echo $v->link =='' ? '#' : $v->link; ?>" target="_blank"><img src="<?php echo $v->image; ?>" width="1000" height="430" /></a>
            <div class="caption" style="bottom:0">
                <p><?php echo $v->title; ?></p>
            </div>
        </div>
		<?php endforeach; ?>
      </div>
      <a href="javascript:;" class="prev"></a>
      <a href="javascript:;" class="next"></a>
</div>
<div class="main clearfix">
    <div class="chang">
         <div class="chatitle"><span class="clu"><a href="javascript:;" class="cpve"></a><a href="javascript:;" class="cnext"></a></span>旗下場所</div>
         <div class="chadiv">
              <ul class="chaul clearfix">
				<?php $articles = Web::get_articles(30, 1, 20); ?>
				<?php foreach ($articles['items'] as $v) { ?>
				<li>
					<a href="<?php echo $v->link; ?>"><img src="<?php echo URL::base('http').$v->thumb ?>" width="320" height="180" /></a>
				<?php } ?>
                </ul>
         </div>
         <div class="info">
            <h1 class="infoh1">ClubOne簡介</h1>
            <p class="infocon"> <?php echo Web::config('about_us'); ?> </p>
         </div>
    </div>
    <div class="charight">
     <div id="zSlider"  class="video">
            <div id="picshow" class="videopic">
                <div id="picshow_img" class="videoimg">
                    <ul>					
						<?php foreach (Web::get_carousel(2, 5) as $v): ?>
						<li><a href="<?php echo $v->link =='' ? '#' : $v->link; ?>" target="_blank"><img src="<?php echo $v->image; ?>"/></a></li>
						<?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div id="select_btn" class="videosmall">
                <ul>
					<?php foreach (Web::get_carousel(2, 5) as $v): ?>
					<li><a href="<?php echo $v->link =='' ? '#' : $v->link; ?>" target="_blank"><img src="<?php echo $v->thumb; ?>"/></a></li>
					<?php endforeach; ?>
                </ul>
            </div>	
     </div>
     <div class="tabdiv">
          <ul class="tab">
               <li class="tabxuan"><a href="#">最新消息</a></li>
               <li><a href="#">最新優惠</a></li>
               <li><a href="#">活動回顧</a></li>
          </ul>
          <div class="hang">
              <ul class="tabcon">
                   <?php foreach ($new_mesag as $v) { ?>
				   <li><a href="<?php echo $v->link; ?>" title="<?php echo htmlentities($v->title); ?>">[<?php echo $v->place_type_name; ?>] <?php echo date('m/d/Y', $v->post_time); ?> <?php echo $v->title; ?></a></li>
				   <?php } ?>
              </ul>
              <ul class="tabcon">
                   <?php foreach ($new_promo as $v) { ?>
				   <li><a href="<?php echo $v->link; ?>" title="<?php echo htmlentities($v->title); ?>">[<?php echo $v->place_type_name; ?>] <?php echo date('m/d/Y', $v->post_time); ?> <?php echo $v->title; ?></a></li>
				   <?php } ?>
              </ul>
              <ul class="tabcon">
                   <?php foreach ($new_activ as $v) { ?>
				   <li><a href="<?php echo $v->link; ?>" title="<?php echo htmlentities($v->title); ?>">[<?php echo $v->place_type_name; ?>] <?php echo date('m/d/Y', $v->post_time); ?> <?php echo $v->title; ?></a></li>
				   <?php } ?>
              </ul>
          </div>
     </div>
         <div class="tabdiv">
              <ul class="tab gao">
                   <li class="tabxuan"><a href="#">新聞稿</a></li>
                   <li><a href="#">報    導</a></li>
                   <li><a href="#">傳媒查詢</a></li>
              </ul>
              <div class="gaodiv">
                  <ul class="tabcon">
					   <?php foreach ($xinwg as $v) { ?>
					   <li><a href="<?php echo $v->link; ?>" title="<?php echo htmlentities($v->title); ?>"><?php echo date('m/d/Y', $v->post_time); ?> <?php echo $v->title; ?></a></li>
					   <?php } ?>
                  </ul>
                  <ul class="tabcon">
					   <?php foreach ($baod as $v) { ?>
					   <li><a href="<?php echo $v->link; ?>" title="<?php echo htmlentities($v->title); ?>"><?php echo date('m/d/Y', $v->post_time); ?> <?php echo $v->title; ?></a></li>
					   <?php } ?>
                  </ul>
                  <ul class="tabcon">
					   <?php foreach ($cmcx as $v) { ?>
					   <li><a href="<?php echo $v->link; ?>" title="<?php echo htmlentities($v->title); ?>"><?php echo date('m/d/Y', $v->post_time); ?> <?php echo $v->title; ?></a></li>
					   <?php } ?>
                  </ul>
              </div>
          </div>
         <div class="Facebook">
              <ul class="Faceul">
                   <li><a href="#">Facebook</a></li>
              </ul>
              <p class="wed">12,219 people like <span>Club Wedding.</span></p>
              <ul class="facepic clearfix">
                   <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/03.gif" width="50" height="50" />Cinox</a></li>
                   <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/03.gif" width="50" height="50" />Cinox</a></li>
                   <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/03.gif" width="50" height="50" />Cinox</a></li>
                   <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/03.gif" width="50" height="50" />Cinox</a></li>
                   <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/03.gif" width="50" height="50" />Cinox</a></li>
                   <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/03.gif" width="50" height="50" />Cinox</a></li>
                   <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/03.gif" width="50" height="50" />Cinox</a></li>
                   <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/03.gif" width="50" height="50" />Cinox</a></li>
                   <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/03.gif" width="50" height="50" />Cinox</a></li>
                   <li><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/03.gif" width="50" height="50" />Cinox</a></li>
              </ul>
              <p class="plugin">Facebook social plugin</p>
         </div>
    </div>
</div>
<?php echo View::factory('footer'); ?>