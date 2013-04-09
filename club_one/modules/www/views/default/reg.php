<?php echo View::factory('header') ?>

<script type='text/javascript' src="/assets/admin/javascript/jquery-1.7.1.min.js"></script>
<script type='text/javascript' src="/assets/admin/javascript/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	/* setup navigation, content boxes, etc... */
	//Administry.setup();
	
	/* datatable */
	var validator = $("#reg_form").validate({
		rules: {   
			email: {required: true}  ,
			password: {required: true}  ,
			password_confirm: {required: true}  ,
			first_name: {required: true}  ,
			last_name: {required: true}  ,
			phone: {required: true}  ,
			spare_email: {required: true}  ,
			privacy: {required: true}  ,
		},
		messages: {  
			email:{required:" <?php echo i18n::get('err_cannot_empty', 'user'); ?>"}  ,
			password:{required:" <?php echo i18n::get('err_cannot_empty', 'user'); ?>"}  ,
			password_confirm:{required:" <?php echo i18n::get('err_cannot_empty', 'user'); ?>"}  ,
			first_name:{required:" <?php echo i18n::get('err_cannot_empty', 'user'); ?>"}  ,
			last_name:{required:" <?php echo i18n::get('err_cannot_empty', 'user'); ?>"}  ,
			phone:{required:" <?php echo i18n::get('err_cannot_empty', 'user'); ?>"}  ,
			spare_email:{required:" <?php echo i18n::get('err_cannot_empty', 'user'); ?>"}  ,
			privacy:{required:" <?php echo i18n::get('err_cannot_empty', 'user'); ?>"}  ,
		},
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("ok");
		}
	});


});

</script>
<div class="main clearfix">
      <div class="clubvip">
                 <ul class="vipul">
                    <li>會員專享優惠 – ClubONE將定期推出優惠為會員獨有。</li>
                    <li>會員活動 – ClubONE將定期推出會員活動，只限會員參加。</li>
                    <li>廠商優惠 – 定期推出廠商優惠，以折扣價購買相關產品。</li>
                    <li>禮物換領 – 會員達到一定的條件，可換領禮物</li>
                </ul>
      </div>
      <div class="viptable">
          <h1 class="yuanh1">會員入會表</h1>
          <h2 class="yuanh2">請填寫以下資料登記成為ClubONE會員 (有星號"<span>*</span> " 為必須填寫項目)</h2>
		<form id="reg_form" method="post" action="<?php echo Web::url('', 'reg/next', 1); ?>">
        <div class="clup">
              <div class="clubtop"></div>
              <table border="0" cellpadding="0" cellspacing="0" class="clubtable">
              <tr>
                <th width="150"><span>*</span>登入電郵</th>
                <td  width="410"><input type="text" id="email" name="email" class="ct"  /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th><span>*</span>密碼</th>
                <td><input type="text" id="password" name="password" class="ct"  /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th><span>*</span>重新輸入密碼</th>
                <td><input type="text" id="password_confirm" name="password_confirm" class="ct"  /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th><span>*</span>姓名</th>
                <td><input type="text" id="first_name" name="first_name" class="ct bt"  /><span class="ming"></span><input type="text" id="last_name" name="last_name" class="ct bt"  /><span class="xing"></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th><span>*</span>性別</th>
                <td>
				<?php echo Form::radios('gender', i18n::get('data_gender', 'user'), 1); ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th><span>*</span>出生日期</th>
                <td>
					<?php 
						$days = array('0' => '日');
						for($i = 1; $i <= 31; $i++) $days[$i] = $i;
						echo Form::select('day', $days, 0, array('class' => 'sel'));
						
						//月
						$months = array('0' => '月');
						for($i = 1; $i <= 12; $i++) $months[$i] = $i;
						echo Form::select('month', $months, 0, array('class' => 'sel'));
						
						//年
						$years = array('0' => '年');						
						for($i = date('Y')-16; $i > date('Y')-70; $i--) $years[$i] = $i;
						echo Form::select('year', $years, 0, array('class' => 'sel'));
					?>(可享生日優惠)</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th><span>*</span>手提電話</th>
                <td><input type="text" id="phone" name="phone" class="ct"  /></td>
                <td>(請輸入手提電話，以便日後聯絡換領禮品之用)</td>
              </tr>
              <tr>
                <th><span>*</span>備用電郵</th>
                <td><input type="text" id="spare_email" name="spare_email" class="ct"  /></td>
                <td> (請輸入備用電郵，以便日後遺失登入電郵時使用)</td>
              </tr>
              <tr>
                <th><span>*</span>婚姻狀況</th>
                <td><?php echo Form::radios('marriage', i18n::get('data_marriage', 'user'), 0); ?> </td>
                 <td></td>
              </tr>
            </table>
            <div class="clubbottom"></div>
       </div>
       <div class="clup">
           <div class="clubtop"></div>
            <p class="cubtitle">閣下有否推薦其他人在ClubONE擺酒? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="ra"><input type="radio"/>有</span><span class="ra"><input type="radio"/>否</span></p>
            <p class="cubtitle">(如"有"請填妥下列被推薦人資料，一經核實，推薦人可獲得豐富禮品。數量有限，送完即止。) </p>
            <table border="0" cellpadding="0" cellspacing="0" class="clubtable">
              <tr>
                <th width="150">被推薦人姓名</th>
                <td><input type="text" id="referrer_name" name="referrer_name" class="ct gt"  /></td>
              </tr>
               <tr>
                <th>被推薦人電話</th>
                <td><input type="text" id="referrer_phone" name="referrer_phone" class="ct gt"  /></td>
              </tr>
            </table>
            <div class="clubbottom"></div>
       </div>
       <div class="tixun">
            <p class="zixun"><input type="checkbox" name="EDM" />希望收取clubone最新資訊及優惠</p>
            <p class="zixun"><input type="checkbox" id="privacy" name="privacy" value=1 />同意接受<a href="#">clubone使用條款</a>及<a href="#">私隱政策</a></p>
			
            <p class="tibtn">
				<a href="#"><input type="submit" value="" class="ti" style="width:100%;height:100%;border:0;cursor: pointer;" /></a>
				<a href="#" class="cannel"><input type="reset" value="" class="cannel" style="width:100%;height:100%;border:0;cursor: pointer;"/></a></p>
       </div>
     </div>
	 </form>
</div>

 

<?php echo View::factory('footer') ?>