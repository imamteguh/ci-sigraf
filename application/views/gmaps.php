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

		addMarker();

	    downloadUrl("<?php echo site_url('api_sistem/bg_layer') ?>", function(data) {
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

	        var html = "<?php echo site_url('welcome/get_chart') ?>" + i;
	        // Construct the polygon.
	        var bermudaTriangle = new google.maps.Polygon({
	            paths: decodedPolygon,
	            strokeColor: warna,
	            strokeOpacity: 0.8,
	            strokeWeight: 2,
	            fillColor: warna,
	            fillOpacity: 0.5
	        });

	        bermudaTriangle.setMap(maphy);

	        showFrame(bermudaTriangle, html);

	        hoverMaps(bermudaTriangle)

	        
	      }
	    });
	}

	function addMarker()
	{
		var marker, i;

    	<?php
    	foreach($point->result() as $p) {
    	?>
    	var image = '<?php echo base_url("assets/img/".$p->icon) ?>';
    	var html = '<p style="text-align:center"><?php echo $p->nama ?><br>Alamat : <?php echo $p->alamat ?></p>';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng<?php echo $p->koordinat ?>,
			map: maphy,
			icon: image
		});
		bindInfoWindow(marker, maphy, infowindow, html);
		<?php
		}
		?>
	}

	function hoverMaps(bermudaTriangle)
	{
		google.maps.event.addListener(bermudaTriangle,"mouseover",function(){
			this.setOptions({fillOpacity: 0.35});
		}); 
        google.maps.event.addListener(bermudaTriangle,"mouseout",function(){
			this.setOptions({fillOpacity: 0.5});
		});
	}

	function showFrame(bermudaTriangle, html) {
		google.maps.event.addListener(bermudaTriangle, 'click', function(event) {
			infowindow.setPosition(event.latLng);
			infowindow.setContent(html);
			infowindow.open(maphy, bermudaTriangle);
			maphy.setZoom(17);
			maphy.setCenter(event.latLng);
		});
	}

	function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
        map.setZoom(17);
        map.setCenter(marker.getPosition());
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
<script>
	function checkpoint() {
		var boxes = document.getElementById('commercial');
		if(boxes[0].checked) {
	        //Do stuff
	        alert("bisa");
	    }
	    if(boxes[1].checked) { alert("bisa bisa"); }
	    if(boxes[2].checked) { alert("bisa kali"); }
	    alert("asu");
	}
</script>