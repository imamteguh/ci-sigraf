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

	// api background layer
	function bg_layer()
	{
		header("Content-type: text/xml");
		$data = $this->db->get_where('map_layer', array('status'=>0));

		echo '<markers>';
			# code...
			// echo '<marker ';
			// echo 'coords="h|zh@ybfoSl@F@h@Tp@d@rA~@jAL`@b@K|@MNITELVlA[jCMJu@pAmAlBgA`GoEj@u@n@gBhA}Dr@mBF_A^{AEuBBu@DiBuEgJSQDSAs@QQ_@@i@_@gAa@Ok@@_@Z}@UWb@qBaA]H}@V_Dd@cBTcBC]a@_Ac@y@Ik@UQUOMWBuACiAQq@OaAi@y@[a@Yq@?e@u@eAy@g@w@Sm@YyAqAcCsA{@q@iDT{EuB[s@w@_AM{@P}@XcBCiAaB_D_A]mFiAcCMmEuBm@dAyCwAQi@wCaAwDLoAEs@Z}@zAmA|Bu@xEWhDKfD}@xAmAlFj@`@pBjB`@QjDThAZb@QJ[`@cA`@[~@@~ARv@NrA|Ap@zCkA|@a@p@BRJTu@dAm@fAa@rCk@dD]hAo@X{AtE|KdC`Cd@dFt@i@Zc@x@W|@DXh@`@jAx@L`@O~@HtAvAtCj@dBjA\v@l@d@~@X~AXr@v@rAz@|Bv@vBd@XPj@^RV@d@`@LbAI|@d@~@Kr@P`A^ZEn@ZX" ';
			// echo 'warna="#666000" ';
			// echo '/>';

		foreach ($data->result() as $rows) {
			echo '<marker ';
			echo 'coords="'.$rows->koordinat.'" ';
			echo 'warna="'.$rows->warna.'" ';
			echo '/>';
		}
		echo '</markers>';
	}

	function get_dropdown_rw()
	{
		$link = "http://192.168.152.116:8082/disduk/webservice/jumduk/rw.php";
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		foreach ($json_decode as $rows) {
			# code...
			echo '<option value="'.$rows['NO_RW'].'">RW '.$rows['NO_RW'].'</option>';
		}
	}

	function get_jumduk_rw()
	{
		$link = "http://192.168.152.116:8082/disduk/webservice/jumduk/rw.php";
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/jumduk_rw', $data);
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