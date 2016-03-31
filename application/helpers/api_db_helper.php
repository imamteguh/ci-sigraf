<?php

function get_jumduk_rw()
{
	// $prov = $this->config->item('kode_prov');
	// $kota = $this->config->item('kode_kota');
	// $kec = $this->config->item('kode_kec');
	// $kel = $this->config->item('kode_kel');


	$link = "http://192.168.152.116:8082/disduk/webservice/jumduk/rw.php";
	$konten = file_get_contents($link);
	$json_decode = json_decode($konten, true);

	return $json_decode;
}

?>