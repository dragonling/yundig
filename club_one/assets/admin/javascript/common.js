//全选
function selectAll(nameVal)
{
	//获取复选框的form对象
	var formObj = $("form:has(:checkbox[name='"+nameVal+"'])");

	//根据form缓存数据判断批量全选方式
	if(formObj.data('selectType')=='none' ||formObj.data('selectType')==undefined)
	{
		$(":checkbox[name='"+nameVal+"']:not(:checked)").attr('checked','checked');
		formObj.data('selectType','all');
	}
	else
	{
		$(":checkbox[name='"+nameVal+"']").attr('checked','');
		formObj.data('selectType','none');
	}
}

function select_tab(tabsname, name)
{
	$('.'+tabsname+' .tab_title').removeClass('selected');
	$('.'+tabsname+' .'+name).addClass('selected');
	
	$('.'+tabsname+' .tab_content').hide();
	$('.'+tabsname+' #'+name).fadeIn(300);
}
//字符串验证
function validate(value,pattern)
{
	switch(pattern)
	{
		case 'required': pattern = /\S+/i;break;
		case 'email': pattern = /^\w+([-+.]\w+)*@\w+([-.]\w+)+$/i;break;
		case 'qq':  pattern = /^[1-9][0-9]{4,}$/i;break;
		case 'id': pattern = /^\d{15}(\d{2}[0-9x])?$/i;break;
		case 'ip': pattern = /^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/i;break;
		case 'zip': pattern = /^\d{6}$/i;break;
		case 'phone': pattern = /^((\d{3,4})|\d{3,4}-)?\d{7,8}(-\d{3})*$/i;break;
		case 'mobi': pattern = /^[0-9]{8,20}$/i;break;
		case 'url': pattern = /^[a-zA-z]+:\/\/(\w+(-\w+)*)(\.(\w+(-\w+)*))+(\/?\S*)?$/i;break;
	}
    if (value.search(pattern) == -1)
    {
       	return false;
    }
    else
    {
		return true;
    }
}

/**
 * @brief 获取控件元素值的数组形式
 * @param string nameVal 控件元素的name值
 * @param string sort    控件元素的类型值:checkbox,radio,text,textarea,select
 * @return array
 */
function getArray(nameVal,sort)
{
	//要ajax的json数据
	jsonData = new Array;

	switch(sort)
	{
		case "checkbox":
		$('input:checkbox[name="'+nameVal+'"]:checked').each(
			function(i)
			{
				jsonData[i] = $(this).val();
			}
		);
		break;
	}
	return jsonData;
}

//弹出框
window.realAlert = window.alert;
window.realConfirm = window.confirm;
/**
 * 警告
 * @param	{String}	消息内容
 */
window.alert = function (content, callback) {
	return artDialog({
		title: 'Warning',
		id: 'Alert',
		icon: 'warning',
		fixed: true,
		content: content,
		ok: true,
		close: callback
	});
};


/**
 * 确认
 * @param	{String}	消息内容
 * @param	{Function}	确定按钮回调函数
 * @param	{Function}	取消按钮回调函数
 */
window.confirm = function (content, yes, no) {
	return artDialog({
		id: 'Confirm',
		title: 'Confirm',
		icon: 'question',
		fixed: true,
		opacity: .1,
		content: content,
		ok: function (here) {
			return yes.call(this, here);
		},
		cancel: function (here) {
			return no && no.call(this, here);
		}
	});
};


/**
 * 提问
 * @param	{String}	提问内容
 * @param	{Function}	回调函数. 接收参数：输入值
 * @param	{String}	默认值
 */
artDialog.prompt = function (content, yes, value) {
	value = value || '';
	var input;
	
	return artDialog({
		id: 'Prompt',
		icon: 'question',
		fixed: true,
		opacity: .1,
		content: [
			'<div style="margin-bottom:5px;font-size:12px">',
				content,
			'</div>',
			'<div>',
				'<input value="',
					value,
				'" style="width:18em;padding:6px 4px" />',
			'</div>'
			].join(''),
		init: function () {
			input = this.DOM.content.find('input')[0];
			input.select();
			input.focus();
		},
		ok: function (here) {
			return yes && yes.call(this, input.value, here);
		},
		cancel: true
	});
};


/**
 * 短暂提示
 * @param	{String}	提示内容
 * @param	{Number}	显示时间 (默认1.5秒)
 */
window.tips = function (content, time) {
	return artDialog({
		id: 'Tips',
		title: false,
        cancel: false,
		fixed: true,
	})
    .content('<div style="padding: 0 1em;">' + content + '</div>')
	.time(time || 1);
};

function editModel(url)
{
	art.dialog.open(url, 
		{
			id:'alert_right',
			width:'700px',
			height:'450px',
			lock:true,
			title: text_edit,
			okVal: btn_save,
			cancelVal: btn_close,
			ok: function(iframeWin, topWin)
			{
				iframeWin.$('#edit_form').submit();
				return false;
			},
			cancel: function (iframeWin, topWin){ selfWin.location.reload()}
		}
	);
}
/**
 * @brief 删除操作
 * @param object conf
	   msg :提示信息;
	   form:要提交的表单名称;
	   link:要跳转的链接地址;
 */
function delModel(conf)
{
	var ok = null;            //执行操作
	var msg   = 'Confirm Delete？';//提示信息

	if(conf)
	{
		if(conf.form)
			var ok = 'formSubmit("'+conf.form+'")';
		else if(conf.link)
			var ok = 'window.location.href="'+conf.link+'"';

		if(conf.msg)
			var msg   = conf.msg;
	}
	if(ok==null && document.forms.length >= 1)
	{
		var ok = '$("#data_list").submit();';
	}	
	
	if(ok!=null)
		window.confirm(msg,{call:function (obj, a) {eval(ok);}});
	else
		alert('删除操作缺少参数');
}

//根据表单的name值提交
function formSubmit(formName)
{
	$('form[name="'+formName+'"]').submit();
}

//根据checkbox的name值检测checkbox是否选中
function checkboxCheck(boxName,errMsg)
{
	if($('input[name="'+boxName+'"]:checked').length < 1)
	{
		alert(errMsg);
		return false;
	}
	return true;
}

//倒计时
var countdown=function()
{
	var _self=this;
	this.handle={};
	this.parent={'second':'minute','minute':'hour','hour':""};
	this.add=function(id){
		_self.handle.id=setInterval(function(){_self.work(id,'second');},1000);
	};
	this.work=function(id,type){
		if(type=="")
			return false;

		var e=document.getElementById("cd_"+type+"_"+id);

		var value=parseInt(e.innerHTML);
		if( value == 0 && _self.work( id,_self.parent[type] )==false )
		{
			clearInterval(_self.handle.id);
			return false;
		}
		else
		{
			e.innerHTML = (value==0?59:(value-1));
			return true;
		}
	};
};

//切换验证码
function changeCaptcha(urlVal)
{
	var radom = Math.random();
	if( urlVal.indexOf("?") == -1 )
	{
		urlVal = urlVal+'/'+radom;
	}
	else
	{
		urlVal = urlVal + '&random'+radom;
	}
	$('#captchaImg').attr('src',urlVal);
}

/*加法函数，用来得到精确的加法结果
 *返回值：arg1加上arg2的精确结果
 */
function mathAdd(arg1,arg2)
{
    var r1,r2,m;
    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}
    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
    m=Math.pow(10,Math.max(r1,r2));
    return (arg1*m+arg2*m)/m;
}

/*减法函数
 *返回值：arg2减arg1的精确结果
 */
function mathSub(arg2,arg1)
{
	var r1,r2,m,n;
	try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}
	try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
	m=Math.pow(10,Math.max(r1,r2));
	//last modify by deeka
	//动态控制精度长度
	n=(r1>=r2)?r1:r2;
	return ((arg2*m-arg1*m)/m).toFixed(n);
}

/*乘法函数，用来得到精确的乘法结果
 *返回值：arg1乘以arg2的精确结果
 */
function mathMul(arg1,arg2)
{
    var m=0,s1=arg1.toString(),s2=arg2.toString();
    try{m+=s1.split(".")[1].length}catch(e){}
    try{m+=s2.split(".")[1].length}catch(e){}
    return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m);
}

/*除法函数，用来得到精确的除法结果
 *返回值：arg1除以arg2的精确结果
 */
function mathDiv(arg1,arg2)
{
    var t1=0,t2=0,r1,r2;
    try{t1=arg1.toString().split(".")[1].length}catch(e){}
    try{t2=arg2.toString().split(".")[1].length}catch(e){}
    with(Math){
        r1=Number(arg1.toString().replace(".",""));
        r2=Number(arg2.toString().replace(".",""));
        return (r1/r2)*pow(10,t2-t1);
    }
}
/*实现事件页面的连接*/
function event_link(url)
{
	window.location.href = url;
}

/**
 * 站外分享
 *
 * @param string type 类别，如qq、kaixin、renren
 * @param string url 要分享的url
 * @param string title 名称，不填也可
 * @author walu
 */
function postShare(type,url,title)
{
	url=url || "";
	url=encodeURIComponent(url);

	title=title || "";
	title=encodeURI(title);

	desURL="";
	switch(type)
	{
		case 'qq':
			desURL='http://v.t.qq.com/share/share.php?url='+url+'&appkey=&site=&pic=&title='+title;
			break;
		case 'kaixin':
			desURL="http://www.kaixin001.com/repaste/share.php?rtitle="+title+"&rurl="+url;
			break;
		case 'renren':
			desURL="http://share.renren.com/share/buttonshare.do?title="+title+"&link="+url;
			break;
		case 'douban':
			desURL="http://www.douban.com/recommend/?url="+url+"&title="+title;
			break;
		case 'xinlang':
			desURL="http://v.t.sina.com.cn/share/share.php?title="+title+"&url="+url;
			break;
		default:break;
	}
	if(desURL)
	{
		window.open(desURL,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes,status=no');
	}
}



function lateCall(t,func)
{
	var _self = this;
	this.handle = null;
	this.func = func;
	this.t=t;

	this.execute = function()
	{
		_self.func();
		_self.stop();
	}

	this.stop=function()
	{
		clearInterval(_self.handle);
	}

	this.start=function()
	{
		_self.handle = setInterval(_self.execute,_self.t);
	}
}

function toggle_subitems(id, fade)
{
	if ($('.parent_id_'+id).attr('id'))
	{
		if(fade == 'fadeIn')
		{			
			$('.parent_id_'+id).each(function (i) {
				if ($('.parent_id_'+id).attr('id'))
				{
					toggle_subitems(this.id, fade);
				}				
			});
			$('#'+id+' .operator').attr('src', '/assets/admin/images/open.gif');
			$('.parent_id_'+id).fadeOut(200);
			$('#'+id).attr('fade', 'fadeOut');
		}
		else
		{
			$('.parent_id_'+id).each(function (i) {
				if ($('.parent_id_'+id).attr('id'))
				{
					toggle_subitems(this.id, fade);
				}
			});
			$('#'+id+' .operator').attr('src', '/assets/admin/images/close.gif');
			$('.parent_id_'+id).fadeIn(200);
			$('#'+id).attr('fade', 'fadeIn');	
		}
		
	}
		
}



var selectRightsWindow = function(url, id, getNamesUrl) {
	var right_values = $('#rights').val();
	art.dialog.open(url+'?keys='+right_values, 
		{
			id: id,
			width:'700px',
			height:'450px',
			lock:true,
			title: text_edit,
			okVal: btn_save,
			cancelVal: btn_close,
			ok: function(iframeWin, topWin)
			{
				$('#rights').val('');
				iframeWin.$('#list_form input:checkbox[checked]').each(function(i){
					
					$('#rights').val($('#rights').val()+this.value+',');
				});
				$.get(getNamesUrl, {keys:$('#rights').val()}, function(data){
					
					$('#rights_name').html(data);					
				});
				return true;
			},
			cancel: function(){}
		}
	)
}

var selectWindow = function(url, id) {
	art.dialog.open(url, 
		{
			id: id,
			width:'700px',
			height:'450px',
			lock:true,
			title: text_edit,
			okVal: btn_save,
			cancelVal: btn_close,
			ok: function(iframeWin)
			{
				iframeWin.$('#data_list').submit();
				var win = art.dialog.open.origin;
				win.location.reload();				
				return false;
			},
			cancel: function(){}
		}
	)
}
var originWindowReload = function() {
}