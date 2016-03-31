<div id="map" style="width: 100%; height: 600px;"></div>

<script src="<?php echo base_url() ?>assets/leaflet/libs/leaflet-src.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/leaflet/libs/leaflet.css" />

<script src="<?php echo base_url() ?>assets/leaflet/src/Leaflet.draw.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/leaflet/dist/leaflet.draw.css" />

<script src="<?php echo base_url() ?>assets/leaflet/src/Toolbar.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/Tooltip.js"></script>

<script src="<?php echo base_url() ?>assets/leaflet/src/ext/GeometryUtil.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/ext/LatLngUtil.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/ext/LineUtil.Intersect.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/ext/Polygon.Intersect.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/ext/Polyline.Intersect.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/ext/TouchEvents.js"></script>

<script src="<?php echo base_url() ?>assets/leaflet/src/draw/DrawToolbar.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/draw/handler/Draw.Feature.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/draw/handler/Draw.SimpleShape.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/draw/handler/Draw.Polyline.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/draw/handler/Draw.Circle.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/draw/handler/Draw.Marker.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/draw/handler/Draw.Polygon.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/draw/handler/Draw.Rectangle.js"></script>


<script src="<?php echo base_url() ?>assets/leaflet/src/edit/EditToolbar.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/edit/handler/EditToolbar.Edit.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/edit/handler/EditToolbar.Delete.js"></script>

<script src="<?php echo base_url() ?>assets/leaflet/src/Control.Draw.js"></script>

<script src="<?php echo base_url() ?>assets/leaflet/src/edit/handler/Edit.Poly.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/edit/handler/Edit.SimpleShape.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/edit/handler/Edit.Circle.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/edit/handler/Edit.Rectangle.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/src/edit/handler/Edit.Marker.js"></script>

<script src="http://eksotik.kotabogor.go.id/assets/data/bogorgeo.geojson" type="text/javascript"></script>
<script>
	var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
		osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});
		map = new L.Map('map', {layers: [osm], center: new L.LatLng(-6.598033,106.7951473), zoom: 15}),
		drawnItems = L.featureGroup().addTo(map);

	function onEachFeature(feature, layer) {
        var popupContent = "<div style='width: 200px'>" +
                                "Kecamatan : "  +feature.properties.KECAMATAN+"<br>" +
                                "Kelurahan : "  +feature.properties.DESA+
                           "</div>";

        if (feature.properties) {
            layer.bindPopup(popupContent);
        }}

    var markerLayer = L.geoJson(bogorgeo, {
                style:
                        function(feature){
                            switch(feature.properties.KECAMATAN){
                                case "BOGOR SELATAN": return{
                                    color:"red"};
                                case "BOGOR TIMUR": return{
                                    color:"blue"};
                                case "BOGOR UTARA": return{
                                    color:"green"};
                                case "BOGOR TENGAH": return{
                                    color:"yellow"};
                                case "BOGOR BARAT": return{
                                    color:"purple"};
                                case "TANAH SEREAL": return{
                                    color:"gray"};
                            }}
                ,
                onEachFeature: onEachFeature
            }
    ).addTo(map);

	map.addControl(new L.Control.Draw({
		edit: { featureGroup: drawnItems }
	}));

	map.on('draw:created', function(event) {
		var layer = event.layer;

		var shape = layer.toGeoJSON()
  		var shape_for_db = JSON.stringify(shape);

		drawnItems.addLayer(layer);

		alert(shape_for_db);
	});

</script>