<?php
	$articles = Web::get_articles($catalog['id'], 1, 100);
	$articles = $articles['items'];
	
?>
 <div class="left">
	  <div class="lefttop"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/left.gif" width="200" height="70" /></div>
	  <ul class="sub">
		<?php foreach ($articles as $v) { ?>
		<li class="<?php echo $v->id == $id ? 'subxuan' : '' ?>"><a href="<?php echo $v->link; ?>" title="<?php echo htmlspecialchars($v->title); ?>"><?php echo $v->title; ?></a></li>
		<?php } ?>
	  </ul>
	  <div class="ye">
		 <p><?php echo nl2br($catalog['desc']) ?></p>
	  </div>
 </div>