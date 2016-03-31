<?php
/**
* Author Imam Teguh
* API database kependudukan
*/
class api_sistem extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_jumduk_rt()
	{
		$rw = $_GET['rw'];
		$link = "http://192.168.152.116:8082/disduk/webservice/jumduk/rt_var.php?id_rw=".$rw;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/jumduk_rt', $data);

	}
}
?>