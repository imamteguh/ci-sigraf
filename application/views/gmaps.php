<div class="ace-settings-container" id="ace-settings-container">
	<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
		<i class="ace-icon fa fa-navicon bigger-130"></i>
	</div>

	<div class="ace-settings-box clearfix" id="ace-settings-box">
		<div class="pull-left">
			<div class="ace-setting-item">
				<h4>Menu Filter Point</h4>
			</div>
		<?php
		foreach ($kat->result() as $k) {
		?>
			<div class="ace-settings-item">
				<input type="checkbox" name="ceklist" class="checklist ace ace-checkbox-1" id="<?php echo 'kk'.$k->id_kategori ?>" value="1" checked="checked" />
				<label class="lbl" for="<?php echo 'kk'.$k->id_kategori ?>"> <?php echo $k->nm_kategori ?></label>
			</div>
		<?php
		}
		?>

		</div><!-- /.pull-left -->
	</div><!-- /.ace-settings-box -->
</div><!-- /.ace-settings-container -->

<div class="row">
	<div class="col-md-12">
		<div id="mapsahay" style="width:100%;height:600px;"></div>
	</div>
</div>

<script>
	var maphy, marker;
	var decodedPolygon = [];
	var amark = [];
	var infowindow;

	var inputElements = document.getElementsByClassName('checklist');

	function initMap() {
		maphy = new google.maps.Map(document.getElementById('mapsahay'), {
			center: {lat: -6.8582913, lng: 107.5257117},
			zoom: 15
		});

		infowindow = new google.maps.InfoWindow();

		addMarkerKantor();
		addMarkerSd();
		addMarkerSmp();
		addMarkerSma();
		addMarkerUniv();
		addMarkerWisata();
		addMarkerPasar();
		addMarkerBs();

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

	function addMarkerKantor()
	{
    	<?php
    	foreach($kantor->result() as $p) {
    	?>
    	var image = '<?php echo base_url("assets/img/".$p->icon) ?>';
    	var html = '<p style="text-align:center"><?php echo $p->nama ?><br>Alamat : <?php echo $p->alamat ?></p>';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng<?php echo $p->koordinat ?>,
			map: maphy,
			icon: image
		});
		bindInfoWindow(marker, maphy, infowindow, html);
		amark.push(marker);
		<?php
		}
		?>
	}
	function addMarkerSd()
	{
    	<?php
    	foreach($sd->result() as $p) {
    	?>
    	var image = '<?php echo base_url("assets/img/".$p->icon) ?>';
    	var html = '<p style="text-align:center"><?php echo $p->nama ?><br>Alamat : <?php echo $p->alamat ?></p>';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng<?php echo $p->koordinat ?>,
			map: maphy,
			icon: image
		});
		bindInfoWindow(marker, maphy, infowindow, html);
		amark.push(marker);
		<?php
		}
		?>
	}
	function addMarkerSmp()
	{
    	<?php
    	foreach($smp->result() as $p) {
    	?>
    	var image = '<?php echo base_url("assets/img/".$p->icon) ?>';
    	var html = '<p style="text-align:center"><?php echo $p->nama ?><br>Alamat : <?php echo $p->alamat ?></p>';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng<?php echo $p->koordinat ?>,
			map: maphy,
			icon: image
		});
		bindInfoWindow(marker, maphy, infowindow, html);
		amark.push(marker);
		<?php
		}
		?>
	}
	function addMarkerSma()
	{
    	<?php
    	foreach($sma->result() as $p) {
    	?>
    	var image = '<?php echo base_url("assets/img/".$p->icon) ?>';
    	var html = '<p style="text-align:center"><?php echo $p->nama ?><br>Alamat : <?php echo $p->alamat ?></p>';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng<?php echo $p->koordinat ?>,
			map: maphy,
			icon: image
		});
		bindInfoWindow(marker, maphy, infowindow, html);
		amark.push(marker);
		<?php
		}
		?>
	}
	function addMarkerUniv()
	{
    	<?php
    	foreach($univ->result() as $p) {
    	?>
    	var image = '<?php echo base_url("assets/img/".$p->icon) ?>';
    	var html = '<p style="text-align:center"><?php echo $p->nama ?><br>Alamat : <?php echo $p->alamat ?></p>';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng<?php echo $p->koordinat ?>,
			map: maphy,
			icon: image
		});
		bindInfoWindow(marker, maphy, infowindow, html);
		amark.push(marker);
		<?php
		}
		?>
	}
	function addMarkerWisata()
	{
    	<?php
    	foreach($wisata->result() as $p) {
    	?>
    	var image = '<?php echo base_url("assets/img/".$p->icon) ?>';
    	var html = '<p style="text-align:center"><?php echo $p->nama ?><br>Alamat : <?php echo $p->alamat ?></p>';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng<?php echo $p->koordinat ?>,
			map: maphy,
			icon: image
		});
		bindInfoWindow(marker, maphy, infowindow, html);
		amark.push(marker);
		<?php
		}
		?>
	}
	function addMarkerPasar()
	{
    	<?php
    	foreach($pasar->result() as $p) {
    	?>
    	var image = '<?php echo base_url("assets/img/".$p->icon) ?>';
    	var html = '<p style="text-align:center"><?php echo $p->nama ?><br>Alamat : <?php echo $p->alamat ?></p>';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng<?php echo $p->koordinat ?>,
			map: maphy,
			icon: image
		});
		bindInfoWindow(marker, maphy, infowindow, html);
		amark.push(marker);
		<?php
		}
		?>
	}
	function addMarkerBs()
	{
    	<?php
    	foreach($bs->result() as $p) {
    	?>
    	var image = '<?php echo base_url("assets/img/".$p->icon) ?>';
    	var html = '<p style="text-align:center"><?php echo $p->nama ?><br>Alamat : <?php echo $p->alamat ?></p>';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng<?php echo $p->koordinat ?>,
			map: maphy,
			icon: image
		});
		bindInfoWindow(marker, maphy, infowindow, html);
		amark.push(marker);
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
			maphy.setZoom(16);
			maphy.setCenter(event.latLng);
		});
	}

	function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
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

    function filterpoint() {
    	$("input[name='ceklist']").change(function() {
    		clearMarkers();
	    	if(inputElements[0].checked) {addMarkerKantor();}
			if(inputElements[1].checked) {addMarkerSd();}
			if(inputElements[2].checked) {addMarkerSmp();}
			if(inputElements[3].checked) {addMarkerSma();}
			if(inputElements[4].checked) {addMarkerUniv();}
			if(inputElements[5].checked) {addMarkerWisata();}
			if(inputElements[6].checked) {addMarkerPasar();}
			if(inputElements[7].checked) {addMarkerBs();}
		});
    }


    // Sets the map on all markers in the array.
	function setMapOnAll(maphy) {
		for (var i = 0; i < amark.length; i++) {
		  amark[i].setMap(maphy);
		}
	}

	// Removes the markers from the map, but keeps them in the array.
	function clearMarkers() {
		setMapOnAll(null);
	}

    filterpoint();
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhtCv07NbDL506YaOuet1tszZbXjwuBgo&callback=initMap&libraries=geometry" async defer></script>
