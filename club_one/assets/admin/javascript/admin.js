jQuery(function(){
	//�߶�����Ӧ
	initLayout();   
	$(window).resize(function(){   
		initLayout();   
	});
	function initLayout() {   
		var h1 = document.documentElement.clientHeight - $("#info_bar").height();   
		var h2 = h1 - $(".headbar").height() - $(".location").height() - $(".pages_bar").height() - 30; 
		$('.content').height(h2);
	}
	/*
	//���ֹ�����ʾ
	$("#tips a:not(:first)").css("display","none");
	var tips_l=$("#tips a:last");
	var tips_f=$("#tips a:first");
	setInterval(function(){
		if($("#tips").children().length	!= 1){			 
			if(tips_l.is(":visible")){
				tips_f.fadeIn(500);
				tips_l.hide()
			}else{
				$("#tips a:visible").addClass("now");
				$("#tips a.now").next().fadeIn(500);
				$("#tips a.now").hide().removeClass("now");
			}
		}
	},3000);
	//����
	var sch_val = "������������";
	$(".search>input.text").blur(
		function(){
			if($(this).val()==''){
				$(this).val(sch_val);
			}
		}
	).click(
		function(){
			if($(this).val()==sch_val){
				$(this).val('');
			}
		}
	);
	//�رղ����
	$("#separator").click(function(){
			document.body.className = (document.body.className == "folden") ? "":"folden";
		}
	);
	
	//�������
	var headcells = $("tr[role='head']>th");
	$(headcells+"[sort='true']").css("cursor","pointer").click(
		function(){
			var index=headcells.index(this)+1;
			var arr=[]; 
			var row=$('#list_table tbody tr');
			var dataType=$(this).attr('datatype'); 
			$.each(row,function(i){arr[i]=row[i]});
			if($(this).find("span").hasClass("arrows_down")){
				arr.reverse();
				$(this).find("span").attr("className","arrows");
			}else {
				arr.sort(sortStr(index,dataType))
				$(this).find("span").attr("className","arrows_down");
			}
			var fragment=document.createDocumentFragment();
			$.each(arr,function(i){
				fragment.appendChild(arr[i]);
			});
			$('#list_table tbody').append(fragment);
		}
	);
	*/

});
function sortStr(index,dataType){ 
	return function(a,b){
		var aText=$(a).find('td:nth-child('+index+')').text();
		var bText=$(b).find('td:nth-child('+index+')').text();
		if(dataType!='text'){
			aText=Parse(aText,dataType);
			bText=Parse(bText,dataType);
			return aText>bText?-1:bText>aText?1:0;
		}else return aText.localeCompare(bText);
	} 
} 
function Parse(data,dataType){ 
	switch(dataType){ 
		case 'num': 
		return parseFloat(data)||0 
		case 'date': 
		return Date.parse(data)||0 
		default : 
		return splitStr(data) 
	}
} 
function splitStr(data){ 
	var re=/^[\$a-zA-z\u4e00-\u9fa5 ]*(.*?)[a-zA-z\u4e00-\u9fa5 ]*$/ 
	data=data.replace(re,'$1') 
	return parseFloat(data) 
}
//��select�����б��趨��ʼֵ
function setSelected(id,value)
{
objSelect=document.getElementById(id)
    for(var i=0;i<objSelect.options.length;i++)
    {
        if(objSelect.options[i].value == value || objSelect.options[i].text == value)
        {
            objSelect.options[i].selected = true;
            break;
        }
     }
}