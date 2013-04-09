<?php echo View::factory('header') ?>

<script type='text/javascript' src="/assets/admin/javascript/jquery-1.7.1.min.js"></script>
<script type='text/javascript' src="/assets/admin/javascript/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	/* datatable */
	var validator = $("#login_form").validate({
		rules: {   
			email: {required: true}  ,
			password: {required: true}  ,
		}
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("ok");
		}
	});


});

</script>

<div class="main clearfix">
      <div class="vip">
           <div class="vipdiv">
                <ul class="vipul">
                    <li>會員專享優惠 – ClubONE將定期推出優惠為會員獨有。</li>
                    <li>會員活動 – ClubONE將定期推出會員活動，只限會員參加。</li>
                    <li>廠商優惠 – 定期推出廠商優惠，以折扣價購買相關產品。</li>
                    <li>禮物換領 – 會員達到一定的條件，可換領禮物</li>
                </ul>
                <a href="<?php echo URL::site('reg'); ?>" class="ru"></a>
           </div>
           <div class="vipuser">
                <h1 class="viph1">會員登入</h1>
				<div class="error"><?php echo htmlspecialchars(Arr::get($_GET, 'msg', ''));?></div>
				<form id="contact_form" method="post" action="<?php echo Web::url('', 'login/authorize', 1); ?>">
                <ul class="yuan">
                     <li><span>電郵</span><input type="text" id="username" name="username"/></li>
                     <li><span>密碼</span><input type="password" id="password" name="password" class="mi" />
					 <a href="javascript:;" onclick="submit()" class="vi"></a></li>
                     <li><span>&nbsp;</span><a href="<?php echo URL::site('reg'); ?>" class="wan">免費登記</a>|<a href="<?php echo URL::site('user/forgot_password'); ?>" class="wan">忘記密碼</a></li>
                </ul>
				</form>
           </div>
      </div>
</div>


<?php echo View::factory('footer') ?>