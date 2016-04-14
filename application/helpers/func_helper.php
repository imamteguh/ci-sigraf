<?php

function getPoint()
{
	$ci =& get_instance();
	$ci->load->model('supermodel');

	$kat = $ci->supermodel->queryManual("SELECT * FROM map_kategori");

	foreach ($kat->result() as $r) {
		# code...
		$judul = str_replace(" ", "", $r->nm_kategori);
	?>
	function add<?php echo $judul ?>()
	{
    	<?php
    	$isi = $ci->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori AND a.id_kategori='$r->id_kategori'");
    	foreach($isi->result() as $p) {
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
	<?php
	}
}

function getFuncPoint()
{
	$ci =& get_instance();
	$ci->load->model('supermodel');

	$kat = $ci->supermodel->queryManual("SELECT * FROM map_kategori");

	$no = 0;
	foreach ($kat->result() as $r) {
		# code...
		$judul = str_replace(" ", "", $r->nm_kategori);
	?>
		if(inputElements[<?php echo $no ?>].checked) {add<?php echo $judul ?>();}
	<?php
	$no++;
	}
}

function getObjPoint()
{
	$ci =& get_instance();
	$ci->load->model('supermodel');

	$kat = $ci->supermodel->queryManual("SELECT * FROM map_kategori");

	foreach ($kat->result() as $r) {
		# code...
		$judul = str_replace(" ", "", $r->nm_kategori);

		echo "add".$judul."(); \n";
	}
}


?>