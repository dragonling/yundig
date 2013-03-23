$(function(){
	var span = '<span></span>';
	$('.navul li a').wrapInner(span);
	
	$('.navdiv .erji:gt(0)').hide();
	var menu_li = $('.navul li');
	
	$('.navul li').mouseover(function(){
		$(this).addClass('xuan')
			   .siblings().removeClass('xuan');
		
		var index = menu_li.index(this);
		$('.navdiv .erji').eq(index).show()
							 .siblings().hide();

	});
});

$(function(){
  $(".maptop").click(function(){
      $(".footer").toggleClass("highlight");
  });
});

$(document).ready(function(){
	$(".menudl").click(function(){
		$(this).addClass("menuclick")			//为当前元素增加highlight类
			.children("dd").show().end()			//将子节点的a元素显示出来并重新定位到上次操作的元素
		.siblings().removeClass("menuclick")		//获取元素的兄弟元素，并去掉他们的highlight类
			.children("dd").hide();				//将兄弟元素下的a元素隐藏
	});
});

$(document).ready(function(){
	$(".link").click(function(){
		$(this).addClass("linkxuan")			//为当前元素增加highlight类
		   .children(".linkcon").show().end()			//将子节点的a元素显示出来并重新定位到上次操作的元素
		.siblings().removeClass("linkxuan")		//获取元素的兄弟元素，并去掉他们的highlight类
		   .children(".linkcon").hide();				//将兄弟元素下的a元素隐藏
	});
});

$(document).ready(function(){
	$(".lianluo").click(function(){
		$(this).addClass("luodiv")			//为当前元素增加highlight类
		   .children(".luocon").show().end()			//将子节点的a元素显示出来并重新定位到上次操作的元素
		.siblings().removeClass("luocon")		//获取元素的兄弟元素，并去掉他们的highlight类
		   .children(".luocon").hide();				//将兄弟元素下的a元素隐藏
	});
});


$(function(){
	var span = '<span></span>';
	$('.tab .xian a').wrapInner(span);
	
	$('.activ .activul:gt(0)').hide();
	var menu_li = $('.tab .xian');
	
	$('.tab .xian').mouseover(function(){
		$(this).addClass('tabxuan')
			   .siblings().removeClass('tabxuan');
		
		var index = menu_li.index(this);
		$('.activ .activul').eq(index).show()
							 .siblings().hide();

	});
});


$(function(){
	var span = '<span></span>';
	$('.tab li a').wrapInner(span);
	
	$('.hang .tabcon:gt(0)').hide();
	var menu_li = $('.tab li');
	
	$('.tab li').mouseover(function(){
		$(this).addClass('tabxuan')
			   .siblings().removeClass('tabxuan');
		
		var index = menu_li.index(this);
		$('.hang .tabcon').eq(index).show()
							 .siblings().hide();

	});
});


$(function(){
	var span = '<span></span>';
	$('.gao li a').wrapInner(span);
	
	$('.gaodiv .tabcon:gt(0)').hide();
	var menu_li = $('.gao li');
	
	$('.gao li').mouseover(function(){
		$(this).addClass('tabxuan')
			   .siblings().removeClass('tabxuan');
		
		var index = menu_li.index(this);
		$('.gaodiv .tabcon').eq(index).show()
							 .siblings().hide();

	});
});

$(function(){
	$('#slides').slides({
		preload: true,
		preloadImage: 'images/loading.gif',
		play: 5000,
		pause: 2500,
		hoverPause: true,
		animationStart: function(){
			$('.caption').animate({
				bottom:-35
			},100);
		},
		animationComplete: function(current){
			$('.caption').animate({
				bottom:0
			},200);
			if (window.console && console.log) {
				// example return of current slide number
				console.log(current);
			};
		}
	});
});



