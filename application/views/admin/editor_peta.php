<div class="row">

<div class="col-md-8">
	
	<div id="mapsahay" style="width:100%;height:600px;">
		
	</div>
</div>

<div class="col-md-4">
	
	<form class="form-horizontal" method="post" action="<?php echo site_url('dashboard/editor_peta') ?>" enctype="multipart/form-data">
	<a onclick="hapus_shape()" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Bersihkan Map</a>
	<button type="submit" class="btn btn-xs btn-success"><i class="fa fa-save"></i> Simpan</button>
	<div class="space-4"></div>		
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">Koordinat</label>

			<div class="col-sm-9">
				<textarea rows="6" placeholder="Koordinat" class="form-control" id="kordinat" name="kordinat" readonly required></textarea>
				<?php echo form_error('kordinat') ?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">Type</label>

			<div class="col-sm-9">
				<input id="tipe" placeholder="Tipe" class="form-control" type="text" name="tipe" onkeyup="load_attr()" readonly required>
			</div>
		</div>

		<div id="point">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Nama</label>

				<div class="col-sm-9">
					<input id="nama" placeholder="Nama Point" class="form-control" type="text" name="nama">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Alamat</label>

				<div class="col-sm-9">
					<textarea rows="6" placeholder="Alamat Point" class="form-control" id="alamat" name="alamat"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Kategori</label>

				<div class="col-sm-9">
					<select name="id_kategori" class="form-control">
						<option value="">- Pilih Kategori -</option>
						<?php
						foreach ($kategori->result() as $r) {
							# code...
							echo '<option value="'.$r->id_kategori.'">'.$r->nm_kategori.'</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Foto</label>

				<div class="col-sm-9">
					<input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="fotopt" />
				</div>
			</div>

		</div>

		<div id="area" style="display: none;">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Judul</label>

				<div class="col-sm-9">
					<input id="judul" placeholder="Nama Area" class="form-control" type="text" name="judul">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Link</label>

				<div class="col-sm-9">
					<input id="link" placeholder="Link dialog" class="form-control" type="text" name="link">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Warna</label>

				<div class="col-sm-9">
					<input id="warna" placeholder="Warna Layer" class="form-control" type="text" name="warna">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Foto</label>

				<div class="col-sm-9">
					<input type="file" id="id-input-file-3" class="col-xs-10 col-sm-5" name="fotoar" />
				</div>
			</div>

		</div>

	</form>
</div>

</div>


<script>
	var maphy;
	var drawingManager;
	var selectedShape;
	function initMap() {
		maphy = new google.maps.Map(document.getElementById('mapsahay'), {
			center: {lat: -6.8582913, lng: 107.5257117},
			zoom: 15
		});

		drawingManager = new google.maps.drawing.DrawingManager({
		    drawingMode: google.maps.drawing.OverlayType.MARKER,
		    drawingControl: true,
		    drawingControlOptions: {
		      position: google.maps.ControlPosition.TOP_CENTER,
		      drawingModes: [
		        google.maps.drawing.OverlayType.MARKER,
		        google.maps.drawing.OverlayType.POLYGON
		      ]
		    }

		});
		drawingManager.setMap(maphy);

		google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
	        var newShape = e.overlay;
	        newShape.type = e.type;

	        // all_shapes.push(newShape);
	        // save_coordinates_to_array(newShape);
	        if (e.type == google.maps.drawing.OverlayType.MARKER)
	        {
	        	var kordinat = e.overlay.getPosition();
	        	document.getElementById('kordinat').value = kordinat;
	        }
	        else if (e.type == google.maps.drawing.OverlayType.POLYGON)
	        {
	        	var kordinat = e.overlay.getPath().getArray();
	        	var eckor = google.maps.geometry.encoding.encodePath(kordinat);
	        	document.getElementById('kordinat').value = eckor;
	        }

	        document.getElementById('tipe').value = e.type;
	        load_attr(e.type);

	        setSelection(newShape);

	        google.maps.event.addListener(newShape, 'click', function() {setSelection(newShape)});

	    });

	    google.maps.event.addListener(maphy, 'click', function(e) {clearSelection();});


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

	function hapus_shape()
	{
		$('#kordinat').val(null);
	    selectedShape.setMap(null);
	}
	function setSelection(shape)
	{
	    // clearSelection();
	    selectedShape = shape;
	    shape.setEditable(true);
	}
	function clearSelection()
	{
	    if(selectedShape)
	    {
	        selectedShape.setEditable(false);
	        selectedShape = null;
	    }
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhtCv07NbDL506YaOuet1tszZbXjwuBgo&libraries=drawing,geometry&callback=initMap" async defer></script>

<script>
function load_attr(tipe)
{
	tipe = document.getElementById('tipe').value;
	if(tipe=="marker")
	{
		$('#point').attr('style', 'display:block');
		$('#area').attr('style', 'display:none');
	}
	else if(tipe=="polygon")
	{
		$('#point').attr('style', 'display:none');
		$('#area').attr('style', 'display:block');
	}
}
</script>
<script type="text/javascript">
	
jQuery(function($) {
	$('#id-input-file-2').ace_file_input({
		no_file:'No File ...',
		btn_choose:'Choose',
		btn_change:'Change',
		droppable:false,
		onchange:null,
		thumbnail:true, //| true | large
		whitelist:'gif|png|jpg|jpeg',
		blacklist:'exe|php'
		//onchange:''
		//
	});
	$('#id-input-file-3').ace_file_input();
})

</script>