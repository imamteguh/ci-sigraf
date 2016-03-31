<div id="mapsahay" style="width:100%;height:600px;"></div>
<script>
	var maphy;
	var decodedPolygon = [];
	var infowindow;

	function initMap() {
		maphy = new google.maps.Map(document.getElementById('mapsahay'), {
			center: {lat: -6.8582913, lng: 107.5257117},
			zoom: 15
		});

		infowindow = new google.maps.InfoWindow();

    	var marker, i;
    	var image = '<?php echo base_url("assets/img/icon.png") ?>';


    	<?php
		foreach ($point->result_array() as $rows) {
		?>
			marker = new google.maps.Marker({
				position: new google.maps.LatLng<?php echo $rows['kordinat'] ?>,
				map: maphy,
				icon: image
			});
			var html = "<?php echo site_url('welcome/get_chart') ?>";
			bindInfoWindow(marker, maphy, infowindow, html);
			// google.maps.event.addListener(marker, 'click', (function(marker, i) {
				
			// 	return function() {
			// 		infowindow.close();
			// 		$.ajax({
			// 			url: "<?php echo site_url('welcome/get_chart') ?>",
			// 			data: "",
			// 			success: function(data) {
			// 				infowindow.setContent(data);
			// 			}
			// 		});
			// 		infowindow.open(maphy, marker);
			// 	}
			// })(marker, i));


		<?php
	    }
	    ?>

	    downloadUrl("<?php echo site_url('welcome/api_area') ?>", function(data) {
	    var xml = data.responseXML;
	    var markers = xml.documentElement.getElementsByTagName("marker");
	    var bounds = new google.maps.LatLngBounds();
	      for (var i = 0; i < markers.length; i++) {
	        var encodedPath = markers[i].getAttribute("coords");
	        var warna = markers[i].getAttribute("warna");

	        var decodedPolygon = google.maps.geometry.encoding.decodePath(encodedPath);
	        for (var j = 0; j < decodedPolygon.length; j++) {
	          bounds.extend(decodedPolygon[j]);
	        }
	        // Construct the polygon.
	        var bermudaTriangle = new google.maps.Polygon({
	            paths: decodedPolygon,
	            strokeColor: warna,
	            strokeOpacity: 0.8,
	            strokeWeight: 1,
	            fillColor: warna,
	            fillOpacity: 0.35
	        });

	        bermudaTriangle.setMap(maphy);

	      }
	    });
	}

	function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent('<iframe src="'+html+'" width="550" height="250"></iframe>');
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhtCv07NbDL506YaOuet1tszZbXjwuBgo&callback=initMap&libraries=geometry" async defer></script>
