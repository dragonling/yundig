
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
	<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/jquery-1.7.1.min.js"></script>
    <style type="text/css">
        .content{width:530px; height: 350px;margin: 10px auto;}
        .content table{width: 100%}
        .content table td{vertical-align: middle;}
        #address{width:220px;height:21px;background: #FFF;border:1px solid #d7d7d7; line-height: 21px;}
    </style>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>
<body>
<div class="content">
    <table>
        <tr>
            <td width="80"><label for="address">Address: </label></td>
            <td width="120"><input id="address" type="text" /></td>
            <td><button type="button" onclick="doSearch()">Search</button></td>
        </tr>
    </table>
    <div id="container" style="width: 100%; height: 340px;margin: 5px auto; border: 1px solid gray;"></div>
</div>
<script type="text/javascript"> 

	var myLatlng = new google.maps.LatLng(22.376255866443813, 114.10840243085933);

	var map = new google.maps.Map(document.getElementById('container'), {
			zoom: 11,
			center: myLatlng,
			streetViewControl: false,
			scaleControl: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
	
	var marker = new google.maps.Marker({
		map: map,
		draggable: true
	});
	function doSearch(){
		var address = document.getElementById('address').value;
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode( { 'address': address}, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				var bounds = results[0].geometry.viewport;
				map.fitBounds(bounds);
				marker.setPosition(results[0].geometry.location);
				marker.setTitle(address);
			} else alert(lang.searchError);
		});
	}
	var show_center = function (){
		var center = map.getCenter();	//center.lat() center.lng()
		var point = marker.getPosition();	// point.lat()   point.lng()
		//var url = "http://maps.google.com/maps/api/staticmap?center=" + center.lat() + ',' + center.lng() + "&zoom=" + map.zoom + "&size=520x340&maptype=" + map.getMapTypeId() + "&markers=" + point.lat() + ',' + point.lng() + "&sensor=false";
               
		$('#p1').html(center.lat());
		$('#p2').html(center.lng());
		$('#map_zoom').html(map.zoom);
	};
	function get_marker()
	{
		return marker;
	}
</script>
</body>
</html>