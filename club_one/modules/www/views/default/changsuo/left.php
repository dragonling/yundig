<?php
	$articles = Web::get_articles($cat, 1, 100);
	$articles = $articles['items'];
	
?>
 <div class="left">
	  <div class="lefttop"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/left.gif" width="200" height="70" /></div>
	  <ul class="sub">
		<?php foreach ($articles as $v) { ?>
		<li class="<?php echo $v->id == $id ? 'subxuan' : '' ?>"><a href="<?php echo $v->link; ?>" title="<?php echo htmlentities($v->title); ?>"><?php echo $v->title; ?></a></li>
		<?php } ?>
	  </ul>
	  <div class="ye">
		  <p>營業時間:</p>
		  <p>早上10時至晚上11時</p>
		  <p>電話：8202 1238</p>
	  </div>
 </div>