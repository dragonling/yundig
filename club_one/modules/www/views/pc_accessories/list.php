<?php echo View::factory('header') ?>

       <div class="center_content">
       	<div class="left_content">
        	<div class="crumb_nav">
            <a href="<?php echo URL::base('http') ?>">home</a> &gt;&gt; <?php echo $category['title']; ?>
            </div>
            <div class="title">	<?php echo $category['title']; ?></div>
           
           <div class="new_products">
           
				<?php foreach ($data as $v) : ?>
				<div class="new_prod_box">
					<a href="<?php echo Web::url('detail', $v->rewrite_url, $v->id); ?>" class="ntitle" title="<?php echo htmlspecialchars($v->title) ?>"><?php echo $v->model ?></a>
					<div class="new_prod_bg">
					<span class="new_icon"><img src="/assets/themes/pc_accessories/images/new_icon.gif" alt="" title="" /></span>
					<a href="<?php echo Web::url('detail', $v->rewrite_url, $v->id); ?>"><img src="<?php echo $v->thumb; ?>" width=90 height=90 alt="<?php echo $v->title ?>" title="<?php echo htmlspecialchars($v->title) ?>" class="thumb" border="0" /></a>
					</div>
				</div>     
                <?php endforeach; ?>

            <div class="pagination">
			<?php echo $pagination; ?>            
            </div>  
            
            </div> 
          
            
        <div class="clear"></div>
        </div><!--end of left content-->
        
		<?php echo View::factory('righter') ?>
       
       
       <div class="clear"></div>
       </div><!--end of center content-->
       
              

<?php echo View::factory('footer') ?>