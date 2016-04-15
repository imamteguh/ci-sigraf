<div class="ace-settings-container" id="ace-settings-container">
	<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
		<i class="ace-icon fa fa-navicon bigger-130"></i>
	</div>

	<div class="ace-settings-box clearfix" id="ace-settings-box">
		<div class="pull-left">
			<div class="ace-setting-item">
				<h4>Menu Filter Point</h4>
				<input type="checkbox" name="allcheck" class="ace ace-checkbox-1" id="allcheck" checked="checked" />
				<label class="lbl" for="allcheck"> -- Semua --</label>
			</div>
			<div class="hr hr10 hr-dotted"></div>
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

		rwlabels();

		<?php echo getObjPoint() ?>

	    downloadUrl("<?php echo site_url('api_sistem/bg_layer') ?>", function(data) {
	    var xml = data.responseXML;
	    var markers = xml.documentElement.getElementsByTagName("marker");
	    var bounds = new google.maps.LatLngBounds();
	      for (var i = 0; i < markers.length; i++) {
	        var encodedPath = markers[i].getAttribute("coords");
	        var warna = markers[i].getAttribute("warna");
	        var link = markers[i].getAttribute("link");
	        var photos = markers[i].getAttribute("foto");
	        var nama_rw = markers[i].getAttribute("nama_rw");

	        var decodedPolygon = google.maps.geometry.encoding.decodePath(encodedPath);
	        for (var j = 0; j < decodedPolygon.length; j++) {
	          bounds.extend(decodedPolygon[j]);
	        }

	        var html = "<?php echo site_url('api_sistem/get_chart') ?>?id_rw=" + link +"&foto=" + photos +"&nama_rw=" + nama_rw;
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

<<<<<<< HEAD
	function addMarkerKantor()
	{
    	<?php
    	foreach($kantor->result() as $p) {
    	?>
    	var image = '<?php echo base_url("assets/img/".$p->icon) ?>';

    	<?php
    	$imgfoto ='';
    	if($p->foto!='') {
    		$imgfoto = '<img src="'.base_url("uploads/peta/".$p->foto).'" height="120">';
    	}
    	?>

    	var html = '<div style="min-width:300px;">' +
    	 			'<h4 style="border-bottom:1px solid #000; font-size:14px; font-weight: 400; padding: 10px 0px;"> ' + 
    	 			'<?php echo $p->nama ?></h4> ' + 
    	 			'<p>Alamat : <?php echo $p->alamat ?></p>' + 
    	 			'<?php echo $imgfoto ?>' +
    	 			'<div>';

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
    	<?php
    	$imgfoto ='';
    	if($p->foto!='') {
    		$imgfoto = '<img src="'.base_url("uploads/peta/".$p->foto).'" height="120">';
    	}
    	?>

    	var html = '<div style="min-width:300px;">' +
    	 			'<h4 style="border-bottom:1px solid #000; font-size:14px; font-weight: 400; padding: 10px 0px;"> ' + 
    	 			'<?php echo $p->nama ?></h4> ' + 
    	 			'<p>Alamat : <?php echo $p->alamat ?></p>' + 
    	 			'<?php echo $imgfoto ?>' +
    	 			'<div>';

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
    	
    	<?php
    	$imgfoto ='';
    	if($p->foto!='') {
    		$imgfoto = '<img src="'.base_url("uploads/peta/".$p->foto).'" height="120">';
    	}
    	?>

    	var html = '<div style="min-width:300px;">' +
    	 			'<h4 style="border-bottom:1px solid #000; font-size:14px; font-weight: 400; padding: 10px 0px;"> ' + 
    	 			'<?php echo $p->nama ?></h4> ' + 
    	 			'<p>Alamat : <?php echo $p->alamat ?></p>' + 
    	 			'<?php echo $imgfoto ?>' +
    	 			'<div>';

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
    	<?php
    	$imgfoto ='';
    	if($p->foto!='') {
    		$imgfoto = '<img src="'.base_url("uploads/peta/".$p->foto).'" height="120">';
    	}
    	?>

    	var html = '<div style="min-width:300px;">' +
    	 			'<h4 style="border-bottom:1px solid #000; font-size:14px; font-weight: 400; padding: 10px 0px;"> ' + 
    	 			'<?php echo $p->nama ?></h4> ' + 
    	 			'<p>Alamat : <?php echo $p->alamat ?></p>' + 
    	 			'<?php echo $imgfoto ?>' +
    	 			'<div>';
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
    	<?php
    	$imgfoto ='';
    	if($p->foto!='') {
    		$imgfoto = '<img src="'.base_url("uploads/peta/".$p->foto).'" height="120">';
    	}
    	?>

    	var html = '<div style="min-width:300px;">' +
    	 			'<h4 style="border-bottom:1px solid #000; font-size:14px; font-weight: 400; padding: 10px 0px;"> ' + 
    	 			'<?php echo $p->nama ?></h4> ' + 
    	 			'<p>Alamat : <?php echo $p->alamat ?></p>' + 
    	 			'<?php echo $imgfoto ?>' +
    	 			'<div>';
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
    	<?php
    	$imgfoto ='';
    	if($p->foto!='') {
    		$imgfoto = '<img src="'.base_url("uploads/peta/".$p->foto).'" height="120">';
    	}
    	?>

    	var html = '<div style="min-width:300px;">' +
    	 			'<h4 style="border-bottom:1px solid #000; font-size:14px; font-weight: 400; padding: 10px 0px;"> ' + 
    	 			'<?php echo $p->nama ?></h4> ' + 
    	 			'<p>Alamat : <?php echo $p->alamat ?></p>' + 
    	 			'<?php echo $imgfoto ?>' +
    	 			'<div>';
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
    	<?php
    	$imgfoto ='';
    	if($p->foto!='') {
    		$imgfoto = '<img src="'.base_url("uploads/peta/".$p->foto).'" height="120">';
    	}
    	?>

    	var html = '<div style="min-width:300px;">' +
    	 			'<h4 style="border-bottom:1px solid #000; font-size:14px; font-weight: 400; padding: 10px 0px;"> ' + 
    	 			'<?php echo $p->nama ?></h4> ' + 
    	 			'<p>Alamat : <?php echo $p->alamat ?></p>' + 
    	 			'<?php echo $imgfoto ?>' +
    	 			'<div>';
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
    	<?php
    	$imgfoto ='';
    	if($p->foto!='') {
    		$imgfoto = '<img src="'.base_url("uploads/peta/".$p->foto).'" height="120">';
    	}
    	?>

    	var html = '<div style="min-width:300px;">' +
    	 			'<h4 style="border-bottom:1px solid #000; font-size:14px; font-weight: 400; padding: 10px 0px;"> ' + 
    	 			'<?php echo $p->nama ?></h4> ' + 
    	 			'<p>Alamat : <?php echo $p->alamat ?></p>' + 
    	 			'<?php echo $imgfoto ?>' +
    	 			'<div>';
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
=======
	<?php echo getPoint() ?>
>>>>>>> 56796bea9e6f0d423c69f31185f2eeed0acddea8

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
			infowindow.setContent('<iframe src="'+ html +'" width="490" height="250" frameborder="0"></iframe>');
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
    		<?php echo getFuncPoint() ?>
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

    function rwlabels()
    {
    	var image = '<?php echo base_url() ?>assets/img/RW13.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.862817575265996, 107.51536130905151),
			map: maphy,
			icon: image
		});
		var image = '<?php echo base_url() ?>assets/img/RW12.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.864990571162614, 107.51701354980469),
			map: maphy,
			icon: image
		});
		var image = '<?php echo base_url() ?>assets/img/RW14.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.861091953811461, 107.51733541488647),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW5.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.866343362616717, 107.52052187919617),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW4.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.864292870130035, 107.52187371253967),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW3.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.8643088480277115, 107.52481341362),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW2.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.863105178233672, 107.53047287464142),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW15.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.862135849018972, 107.52575755119324),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW24.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.8583490549883095, 107.52006590366364),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW8.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.856144072444067, 107.5237888097763),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW7.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.8595687148619815, 107.52504408359528),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW6.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.860495441236828, 107.51958847045898),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW18.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.8588230716420915, 107.52691626548767),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW19.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.859909579945142, 107.52814471721649),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW16.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.8612410818383704, 107.52837538719177),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW22.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.858215904158004, 107.5296601653099),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW17.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.861075975805812, 107.53225386142731),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW1.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.857491562989256, 107.53544569015503),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW9.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.853997666592581, 107.5261116027832),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW10.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.854711360926071, 107.52965211868286),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW11.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.851782011704967, 107.53370761871338),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW20.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.85628787596451, 107.52752780914307),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW21.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.856937654293613, 107.52990961074829),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW23.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.855931030111772, 107.5319454073906),
			map: maphy,
			icon: image
		});
		    	var image = '<?php echo base_url() ?>assets/img/RW25.png';
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.857406346308759, 107.53263473510742),
			map: maphy,
			icon: image
		});
    }

    $("#allcheck").change(function() {
    	$("input[name='ceklist']").not(this).prop('checked', this.checked);
    	clearMarkers();
    	<?php echo getFuncPoint() ?>
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhtCv07NbDL506YaOuet1tszZbXjwuBgo&callback=initMap&libraries=geometry" async defer></script>
