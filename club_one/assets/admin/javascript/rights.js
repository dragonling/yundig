var dirs;
var controllers;
var actions;
// ajax get controller list
function get_dirs(module)
{
	$('#controllers').html('');
	if (module == '') return ;
	
	$.getJSON(get_controllers_url, {'module':module, 'rand':Math.random()}, function(json) {
		
		if (json['status'] == 'success')
		{
			dirs = json['data']['dirs'];
			controllers = json['data']['files'];
			actions = json['data']['actions'];
			options = '';
			for(key in dirs)
			{
				options += '<option value="'+key+'">'+dirs[key]+'</option>';
			}
			$('#dir').html(options);
		}
	});
}
function get_controllers(dir)
{
	if (dir != 0)
	{
		options = '';
		for(key in controllers[dir])
		{
			options += '<option value="'+key+'">'+controllers[dir][key]+'</option>';
		}
		$('#controller').html(options);
	}
}
function get_actions(controller)
{
	if (controller != 0)
	{
		dir = $('#dir').val();
		options = '';
		for(key in actions[dir][controller])
		{
			options += '<option value="'+key+'">'+actions[dir][controller][key]+'</option>';
		}
		$('#action').html(options);
	}
}
//append right to
function append_right_to()
{
	var route      = $('#route').val();
	var dir        = $('#dir').val();
	var controller = $('#controller').val();
	var action     = $('#action').val();
	
	if (action == 0) action = '';
	add_right(route+'/'+dir+'/'+controller+'/'+action);
}
//add permission code
function add_right(val)
{
	var val = (val == undefined) ? '' : val;
	if ($('#right_type').val() == 2)
	{
		$('#rightBox').html('');
	}
	var rightStr = '<tr><td><input type="text" class="middle" value="'+val+'" name="rights[]" /></td><td><label onclick="$(this).parent().parent().remove();" class="del"></label></td></tr>';
	$('#rightBox').prepend(rightStr);
}

var change_type = function(type) {
	switch (type) {
		case '1' :
			$('.right_sets').hide();
			break;
		case '2' :
			$('#rightBox').html('');
			var rightStr = '<tr><td><input type="text" class="middle" value="" name="rights[]" /></td><td><label onclick="$(this).parent().parent().remove();" class="del"></label></td></tr>';
			$('#rightBox').prepend(rightStr);
			$('.right_sets').show();				
			break;
		case '3' :
			$('#rightBox').html('');
			var rightStr = '<tr><td><input type="text" class="middle" value="" name="rights[]" /></td><td><label onclick="$(this).parent().parent().remove();" class="del"></label></td></tr>';
			$('#rightBox').prepend(rightStr);
			$('.right_sets').show();			
			break;
	}
}