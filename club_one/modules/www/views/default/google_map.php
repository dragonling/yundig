
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script>eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('5 b;5 4=8 l;5 3=8 l;e B(){d(3.1){1=3.1}j{1=y.z};d(3.2){2=3.2}j{2=E.F};d(3.c){g=C(3.c)}j{g=s};5 n=8 7.6.k(1,2);5 m={c:g,t:n,u:7.6.x.w};b=8 7.6.v(G.S("R"),m);d(4){Q(i P 4){5 a=8 7.6.T({U:8 7.6.k(4[i].1,4[i].2),b:b});a.J(4[i].f);d(4[i].9!=\'\'){o(a,4[i].9)}}}};e o(a,9){5 p=8 7.6.K({N:9,M:8 7.6.L(q,q)}).r(b,a);7.6.H.I(a,\'O\',e(){p.r(b,a)})};5 h=0;e D(1,2,f,9){h++;4[h]={1:1,2:2,f:f,9:9}};e A(1,2,c){3.1=1;3.2=2;3.c=c}',57,57,'|lat|lng|map_center|map_markers|var|maps|google|new|message|marker|map|zoom|if|function|title|mzoom|map_count||else|LatLng|Array|myOptions|myLatlng|attachSecretMessage|infowindow|50|open|11|center|mapTypeId|Map|ROADMAP|MapTypeId|22|376255866443813|set_map_option|initialize_map|parseInt|add_map_marker|114|10840243085931|document|event|addListener|setTitle|InfoWindow|Size|size|content|click|in|for|map_canvas|getElementById|Marker|position'.split('|'),0,{}))</script>
<script>
<?php
	//google map code
	/*
		var map;
		var map_markers = new Array;
		var map_center = new Array;
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
		var map_count = 0;
		function add_map_marker(lat, lng, title, message)
		{
			map_count++;
			map_markers[map_count] = {lat:lat, lng:lng, title:title, message:message};
		}
		function set_map_option(lat, lng, zoom) {
			
			map_center.lat = lat;
			map_center.lng = lng;
			map_center.zoom = zoom;
		}
	*/
?>

$(document).ready(function() {
	<?php
		if (isset($maps) && is_array($maps))
		{
			foreach ($maps['positions'] as $i => $v)
			{
				if (isset($v['lat']) && isset($v['lng']))
				{
					echo "add_map_marker('{$v['lat']}', '{$v['lng']}', '{$v['title']}', '{$v['message']}');";
				}
			}
			echo "set_map_option({$maps['lat']}, {$maps['lng']}, {$maps['zoom']});";
			echo 'initialize_map();';
		}
		
	?>
});
</script>
<div style="width:100%">
<div id="map_canvas" style="width:100%; height:500px;float:right;"></div>
</div>