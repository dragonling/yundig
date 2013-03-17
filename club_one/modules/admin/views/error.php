<?=View::factory('header')?>

<div id="page">
		<!-- Wrapper -->
		<div class="wrapper">
				<!-- Left column/section -->
				<section class="column width8 first">					
						
							<h2>Error message</h2>
							<div class="box box-error"><?=$message?></div>
							<div class="box box-error-msg">
								<label>选择操作</label>
								<ol>
									<li><a href="javascript:history.go(-1)">返回上一页</a></li>
                                    <li>返回首页</li>
                                    
									
								</ol>
							</div>
					
				
				</section>
				<!-- End of Left column/section -->
				
				<!-- Right column/section -->
				
				<!-- End of Right column/section -->
				
		</div>
		<!-- End of Wrapper -->
	</div>
<?=View::factory('footer')?>
