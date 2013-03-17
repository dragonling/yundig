<?php echo View::factory('header') ?>
 
<style>	
	p.details{padding:0 15px 5px 15px;height:185px;overflow:hidden;	}
</style>
<!-- Ativando o jQuery lightBox plugin -->
<script type="text/javascript">
$(function() {

	$('.feat_prod_box_details .prod_img li a').lightBox({	
			imageLoading:			'<?php echo URL::base('http') ?>assets/jquery/lightbox-0.5/images/lightbox-ico-loading.gif',
			imageBtnPrev:			'<?php echo URL::base('http') ?>assets/jquery/lightbox-0.5/images/lightbox-btn-prev.gif',
			imageBtnNext:			'<?php echo URL::base('http') ?>assets/jquery/lightbox-0.5/images/lightbox-btn-next.gif',
			imageBtnClose:			'<?php echo URL::base('http') ?>assets/jquery/lightbox-0.5/images/lightbox-btn-close.gif',
			imageBlank:				'<?php echo URL::base('http') ?>assets/jquery/lightbox-0.5/images/lightbox-blank.gif',
	});
	$('#gallery').tinycarousel({ display: 4 });
});
</script>

<div class="center_content">
<div class="left_content">
	<div class="crumb_nav">
	<a href="<?php echo URL::base('http') ?>">home</a> &gt;&gt; <?php echo $data['title']; ?>
	</div>
	<div class="title" style="width:580px;"><?php echo $data['title']; ?></div>

	<div class="feat_prod_box_details">
	
		<div class="prod_img">
			<div class="prod_img_mid">
				<li><a href="<?php echo $data['images'][0] ?>"><img src="<?php echo $data['images'][0].'_270x270.jpg' ?>" alt="" title="" width="270"/></a></li>
			</div>
			
			<div id="gallery" >
				<a href="#" class="bt_before prev"><b class="bt">◆</b></a>
				<div class="viewport">
				<ul class="overview">
				<?php foreach ($data['images'] as $v) : ?>
				<li><a href="<?php echo $v; ?>"><img src="<?php echo $v.'_50x50.jpg'; ?>" width="50" height="50" border="0" /></a></li>
				<?php endforeach; ?>
				</ul>
				</div>
				<a href="#" class="bt_next next"><b class="bt">◆</b></a>
			</div>		
		</div>
		
		<div class="prod_det_box">
			<div class="box_top"></div>
			<div class="box_center">
			<div>
				<span class="prod_title">Model: </span><?php echo $data['model']; ?>
			</div>
			<div class="prod_title">Details: </div>
			<p class="details"><?php echo $data['desc']; ?></p>
			<div>
				<a href="<?php echo URL::site('articles/contact_us').URL::query(); ?>" class="contact_supplier"></a>
			</div>
			<div class="clear"></div>
			</div>
			
			<div class="box_bottom"></div>
		</div>    
	<div class="clear"></div>
	</div>	
	
	  
	<div id="demo" class="demolayout">

		<ul id="demo-nav" class="demolayout">
			<?php foreach($data['contents'] as $k => $v) :?>
			<?php if (trim($v->content) == '') continue; ?>
			<li><a class="active" href="#tab<?php echo ($k+1)?>"><?php echo $v->title?></a></li>
			<?php endforeach; ?>
		</ul>

	<div class="tabs-container">
	
		<?php foreach($data['contents'] as $k => $v) :?>
		<?php if (trim($v->content) == '') continue; ?>
		<div style="<?php $k == 0 ? 'display: block;' : 'display: none;'; ?>" class="tab" id="tab<?php echo ($k+1)?>">
		<?php echo $v->content; ?>
		</div>	
		<?php endforeach; ?>
	</div>


	</div>
	

	
<div class="clear"></div>
</div><!--end of left content-->

<script type="text/javascript">

var tabber1 = new Yetii({
id: 'demo'
});

</script>
<?php echo View::factory('righter') ?>


<div class="clear"></div>
</div><!--end of center content-->

              

<?php echo View::factory('footer') ?>