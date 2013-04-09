<?php /*有邊框詳情頁*/  ?>
<?php echo View::factory('header'); ?>

<div class="main clearfix">
     <?php 
		//left
		echo View::factory('changsuo/left', array('catalog' => $catalog, 'id' => $data['id']));
	 ?>
     <div class="right">
          <ul class="menu">
			<?php foreach (Web::get_catalogs($catalog['parent_id'], (isset($catalog['id']) ? $catalog['id'] : 0), 'menuxuan') as $k => $nav) { ?>
			<li class="<?php echo $nav['class'] ?>"><?php echo $k > 0 ? '·' : ''; ?>
				<a href="<?php echo $nav['link'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a>
			</li>
			<?php } ?>
          </ul>
		<div class="medio">
		 <div class="flow" style="height:600px;overflow-y:auto;">
			<?php foreach ($data['contents'] as $v) { ?>
				<div class="flowdl clearfix">
				<?php echo $v->content; ?>
				</div>
			<?php } ?>
		  </div>
		</div>
     </div>
</div>


<?php echo View::factory('footer'); ?>