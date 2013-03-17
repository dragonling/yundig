<?php echo View::factory('header') ?>
<style>
	.data_table{width:100%;}
	.data_table td{border-bottom:1px dashed #ccc}
</style>
       <div class="center_content">
       	<div class="left_content">
        	<div class="crumb_nav">
            <a href="<?php echo URL::base('http') ?>">home</a> &gt;&gt; <?php echo $catalog['title']; ?>
            </div>
            <div class="title">	<?php echo $catalog['title']; ?></div>
           
           <div class="new_products">
           
				
			<table class="data_table" width="100%">
			<?php foreach ($data as $v) { ?>
				<tr>
					<td width="80%" height="20px"><a href="<?php echo Web::url('article', $v->rewrite_url, $v->id, ($catalog['rewrite_url'] != '' ? $catalog['rewrite_url'] : $catalog['id'])); ?>"><?php echo $v->title; ?></a></td>
					<td align="right"><?php echo date('Y/m/d', $v->post_time); ?></td>
				</tr>
			<?php } ?>
			</table>

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