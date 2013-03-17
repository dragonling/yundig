function initMenu(data,current,url)
{
	for(i in data)
	{
		if(data[i]['current'])
		{
			$('#menu ul').append('<li class="selected"><a href="#">'+data[i]['title']+'</a></li>');
            var list = data[i]['list'];
            var item = '';
            for(j in list)
            {
                item = '<li><span>'+j+'</span><ul name="menu">';
                for(k in list[j])
                {
                    if( list[j][k].urlPathinfo == current ) item +='<li class="selected"><a href="'+k+'">'+list[j][k].name+'</a></li>';
                    else item +='<li><a href="'+k+'">'+list[j][k].name+'</a></li>';
                }
                $('.submenu').append(item+'</ul></li>');
            }
		}
		else
		{
			//$('#menu ul').append('<li><a href="'+data[i]['link']+'" hidefocus = "true">'+data[i]['title']+'</a></li>');
			$('#menu ul').append('<li onclick="select_menu($(this))"><a onclick="loadSubMenus('+data[i]['id']+');open_window('+data[i]['id']+', \''+data[i]['title']+'\', \''+data[i]['link']+'\')" href="javascript:;" hidefocus = "true">'+data[i]['title']+'</a></li>');
		}
	}
}
function loadSubMenus(id)
{
	var url = base_url+'admin/menu/main/sub?parent_id='+id+'&'+Math.random();
	
    $('.submenu li').remove();
    $('.submenu').append('<li class="loading">&nbsp;</li>');
    
	$.getJSON(url, function(data) {
			var item = '';
			for(j in data)
            {
                item += '<li><span onclick="$(this).parent().find(\'ul\').toggle(300)">'+data[j]['name']+'</span><ul name="menu">';
                var list = data[j]['list'];
                for(k in list)
                {
					item +='<li><a href="'+list[k]['link']+'" id="'+list[k]['id']+'" title="'+list[k]['title']+'" target="'+list[k]['target']+'">'+list[k]['title']+'</a></li>';
                }
				item += '</ul></li>';
            }
            $('.submenu li').remove();
            $('.submenu').append(item);
            
			$(".submenu a[target=]").bind('click', function() {
				href = this.href;
				open_window(this.id, this.title, this.href);
				this.href = 'javascript:;';
				window.setTimeout("set_href('"+this.id+"', '"+href+"')", 200);
			});
			
			$("a[target=_ajax]").fancybox();
	});
}
function set_href(id, href)
{
	$('#'+id).attr('href', href);
}
function select_menu(obj)
{
	$('#menu ul li').removeClass('selected');
	obj.addClass('selected');
}
function open_window(id, name, url)
{
	if (url == '' || url == '#')
	{
		return true;
	}
	else if (url.substring(0, 11) == 'javascript:' || url.substring(base_url.length, base_url.length+11) == 'javascript:')
	{
		eval(url);
		return true;
	}
	
	$('#windows iframe').hide();
	$('#info_bar').show();
	$('#info_bar .nav_sec').removeClass('selected');
	frame = "frame_"+id;
	nav = "nav_"+id;
	
	if(document.getElementById(frame))
	{
		$('#info_bar #'+nav).addClass('selected');
		$('#windows #'+frame).show();
	}
	else
	{
		var html = '<iframe id="'+frame+'" src="'+url+'" style="width:100%;height:100%;" class="loading" frameborder="0"></iframe>';
		$('#windows').append(html);
		
		var html = '<span class="nav_sec selected" id="'+nav+'" alt="'+id+'"><label href="javascript:;" onclick="switch_window('+id+')">'+name+'</label><a href="javascript:;" onclick="close_window('+id+')" class="close">x</a></span>';
		$('#info_bar').append(html);
	}
}

function close_window(id)
{
	frame = "#frame_"+id;
	nav = "#nav_"+id;
	$('#info_bar '+nav).remove();
	$('#windows '+frame).remove();
	
	var id = $('#info_bar .nav_sec').last().attr('alt');
	switch_window(id);	
}

function switch_window(id)
{
	$('#windows iframe').hide();
	$('#info_bar').show();
	$('#info_bar .nav_sec').removeClass('selected');
	frame = "frame_"+id;
	nav = "nav_"+id;
	
	$('#info_bar #'+nav).addClass('selected');
	$('#windows #'+frame).show();
}