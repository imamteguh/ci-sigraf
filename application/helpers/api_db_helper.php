<?php

function get_jumduk_rw()
{
	$link = "http://192.168.152.116:8082/disduk/webservice/jumduk/rw.php";
	$konten = file_get_contents($link);
	$json_decode = json_decode($konten, true);

	return $json_decode;
}

?>