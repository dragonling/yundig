
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script>
var map;
function initialize_map() {

  if (map_center.lat) { lat = map_center.lat; }
  else { lat = 22.376255866443813; }
  
  if (map_center.lng) { lng = map_center.lng; }
  else { lng = 114.10840243085931; }
  
  if (map_center.zoom) { mzoom = parseInt(map_center.zoom); }
  else { mzoom = 11; }
  
  var myLatlng = new google.maps.LatLng(lat, lng);
  var myOptions = {
    zoom: mzoom,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }

  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  if (map_markers) {
	for (i in map_markers) {
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(map_markers[i].lat, map_markers[i].lng), 
			map: map
		});
		marker.setTitle(map_markers[i].title);
		if (map_markers[i].message != '')
		{
			attachSecretMessage(marker, map_markers[i].message);
		}
	}
  }
}

// The five markers show a secret message when clicked
// but that message is not within the marker's instance data

function attachSecretMessage(marker, message) {
  var infowindow = new google.maps.InfoWindow(
      { content: message,
        size: new google.maps.Size(50,50)
      }).open(map,marker);
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}
function open_google_map()
{
	art.dialog.open('<?php echo URL::site('admin/common/map/google_map'); ?>', 
		{
			id:'frame_google_map',
			width:'600px',
			height:'400px',
			top:'0px',
			left:'100%',
			title: 'Google Map',
			okVal: 'Add',
			cancelVal: btn_close,
			ok: function(iframeWin, topWin)
			{
				var marker = iframeWin.get_marker();
				selfWin.add_map_marker(marker.getPosition().lat(), marker.getPosition().lng(), marker.title, '');
				return false;
			},
		}
	);
}
var map_count = 0;
function add_map_marker(lat, lng, title, message)
{
	lat_input = '<input type="text" name="maps[positions]['+map_count+'][lat]" value="'+lat+'" /> ';
	lng_input = '<input type="text" name="maps[positions]['+map_count+'][lng]" value="'+lng+'" />';
	title_input = '<input type="text" name="maps[positions]['+map_count+'][title]" value="'+title+'" />';
	message = '<textarea name="maps[positions]['+map_count+'][message]" style="width:302px">'+message+'</textarea>';
	div = '<div style="border:1px dotted #ddd">';
	div += '<a href="javascript:;" onclick="$(this).parent().remove()" class="f_r" style="border:1px solid #ddd">Del</a>';
	div += lat_input+lng_input+title_input+message;
	div += '</div>';
	$('#maps').html($('#maps').html()+div);
	$('#map_zoom').html('<input type="text" name="maps[zoom]" value="11" />');
	
	map_count++;
	
	if ( ! map)
	{
		map_markers[map_count] = {lat:lat, lng:lng, title:title, message:message};
	}
	else
	{
		var new_position = new google.maps.LatLng(lat, lng);
	  
		var marker = new google.maps.Marker({
			position: new_position, 
			map: map
		});
		marker.setTitle(title);
		if (message != '')
		{
			attachSecretMessage(marker, message);
		}
	}
}

function set_map_options()
{
	if (map) {
		$('#map_zoom').html('<input type="hidden" name="maps[zoom]" value="'+map.zoom+'" />');
		var lat = '<input type="hidden" name="maps[lat]" value="'+map.getCenter().lat()+'" />';
		var lng = '<input type="hidden" name="maps[lng]" value="'+map.getCenter().lng()+'" />';
		$('#map_center').html(lat+lng);
	}
}
var map_markers = new Array;
var map_center = new Array;
$(document).ready(function(){
	<?php
		if (isset($maps) && is_array($maps))
		{
			if (isset($maps['positions']))
			{
				foreach ($maps['positions'] as $i => $v)
				{
					if (isset($v['lat']) && isset($v['lng']))
					{
						echo "add_map_marker('{$v['lat']}', '{$v['lng']}', '{$v['title']}', '{$v['message']}');\n";
					}
				}
			}
			echo 'map_center.zoom="'.@$maps['zoom'].'";';
			echo 'map_center.lat="'.@$maps['lat'].'";';
			echo 'map_center.lng="'.@$maps['lng'].'";';
			echo '$(\'#map_zoom\').html(\'<input type="hidden" name="maps[zoom]" value="'.@$maps['zoom'].'" />\');';
			echo '$(\'#map_center\').html(\'<input type="hidden" name="maps[lat]" value="'.@$maps['lat'].'" />\'+\'<input type="hidden" name="maps[lng]" value="'.@$maps['lng'].'" />\')';
		}
		
	?>
});
</script>
<div style="width:100%">
<div style="width:400px; height:400px;float:left;">
	<p>
		<button type="button" onclick="open_google_map()" value="" class="btn f_l"/><?php echo I18n::get('button_add_map_marker', 'cms'); ?></button>
		<button type="button" onclick="initialize_map()" value="" class="btn f_r"/><?php echo I18n::get('button_load_map', 'cms'); ?></button>
	</p>
	<div class="clearfix"></div>
	<div id="map_zoom"></div>
	<div id="map_center"></div>
	<div id="maps"></div>
</div>
<div id="map_canvas" style="width:500px; height:400px;float:right;" onmouseout="set_map_options()"></div>
</div>