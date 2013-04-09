<?php echo View::factory('header'); ?>

<div class="main clearfix">
     <div class="left">
		<?php echo View::factory('home/left', array('catalog' => $catalog)); ?>     </div>
     <div class="medio">
			<div class="chaxun clearfix">
                <h1 class="chah1">傳媒查詢</h1>
                <p class="chap"> 如果任何查詢或意見，請填妥下列表格，再按「遞交」。</p>
                <p class="chap">請先參閱本公司<span>個人資料（私隱）政策。</span></p>
                <h1 class="chah2">（<span>*</span> 必須填寫欄位）</h1>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
                  <tr>
                    <th><br /><br /></th>
                    <td></td>
                  </tr>
                  <tr>
                    <th >姓名<span>*</span></th>
                    <td><input type="text" /></td>
                  </tr>
                  <tr>
                    <th >公司機構 <span>*</span></th>
                    <td><input type="text" /></td>
                  </tr>
                  <tr>
                    <th >電郵地址 <span>*</span></th>
                    <td><input type="text" /></td>
                  </tr>
                  <tr>
                    <th >聯絡電話 <span>*</span></th>
                    <td><input type="text" /></td>
                  </tr>
                  <tr>
                    <th >查詢/意見 <span>*</span></th>
                    <td><textarea></textarea></td>
                  </tr>
                  <tr>
                    <th >&nbsp;</th>
                    <td><a href="#" class="tijiao"></a></td>
                  </tr>
                </table>
               <h1 class="chah1">新聞界聯絡</h1>
			    
				<?php foreach ($data as $k => $v) { ?>
                 <div class="lianluo <?php echo $k == 0 ? 'luodiv' : '' ?>">
                       <div class="luotitle"><span></span><?php echo $v->title; ?></div>
                       <div class="luocon">
							<?php 
								foreach (Web::get_article_contents($v->id) as $content)
								{ 
									echo $content->content;
								}
							?>
                       </div>
                   </div>
				<?php } ?>
          </div>
     </div>
</div>


<?php echo View::factory('footer'); ?>