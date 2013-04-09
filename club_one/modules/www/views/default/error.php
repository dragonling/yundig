<?=View::factory('header')?>

<div class="main clearfix">
		<!-- Wrapper -->
		<div class="wrapper" style="text-align:center;">
				<!-- Left column/section -->
				<section>					
						
							<h2>Error message</h2>
							<ul class="">
							<?php 
								if (is_array($message))
								{
									foreach ($message as $v)
									{
										echo '<li>'.$v;
									}
								}
								else
								{
									echo '<li>'.$message;
								}
							?>
							</ul>
							<div style="width:160px;text-align:left;margin:0 auto;">
								<ol>
									<li><a href="javascript:history.go(-1)">Back</a></li>
                                    <li><a href="<?php echo URL::base('http'); ?>">Go Home</a></li>
								</ol>
							</div>
				</section>				
		</div>
		<!-- End of Wrapper -->
	</div>
<?=View::factory('footer')?>
