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

	public $urlserver = 'http://192.168.152.6:8082/disduk/';

	// api background layer
	function bg_layer()
	{
		header("Content-type: text/xml");
		$data = $this->db->get_where('map_layer', array('status'=>0));

		echo '<markers>';

		foreach ($data->result() as $rows) {
			echo '<marker ';
			echo 'coords="'.$rows->koordinat.'" ';
			echo 'warna="'.$rows->warna.'" ';
			echo 'link="'.$rows->link.'" ';
			echo 'foto="'.$rows->foto.'" ';
			echo 'nama_rw="'.$rows->nama_rw.'" ';
			echo '/>';
		}
		echo '</markers>';
	}

	function get_chart()
	{
		$rw = $_GET['id_rw'];
		$link = $this->urlserver."webservice/jumduk/rt_var.php?id_rw=".$rw;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;
		$data['judul'] = $rw;
		$data['photo'] = $_GET['foto'];
		$data['nama_rw'] = $_GET['nama_rw'];

		$this->load->view('highchart', $data);
	}

	function get_dropdown_rw()
	{
		$link = $this->urlserver."webservice/jumduk/rw.php";
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		foreach ($json_decode as $rows) {
			# code...
			echo '<option value="'.$rows['NO_RW'].'">RW '.$rows['NO_RW'].'</option>';
		}
	}

	function get_jumduk_rw()
	{
		$link = $this->urlserver."webservice/jumduk/rw.php";
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/jumduk_rw', $data);
	}

	function get_jumduk()
	{
		$link = $this->urlserver."webservice/jumduk/rw.php";
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$jumlk = 0;
		$jumpr = 0;
		foreach ($json_decode as $j) {
			# code...
			$jumlk = $jumlk + $j['LAKI_LAKI'];
			$jumpr = $jumpr + $j['PEREMPUAN'];
		}

		$data['jumlk'] = $jumlk;
		$data['jumpr'] = $jumpr;

		$this->load->view('chart/jumduk_pie', $data);
	}

	function get_jumduk_rt()
	{
		$rw = $_GET['rw'];
		$link = $this->urlserver."webservice/jumduk/rt_var.php?id_rw=".$rw;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/jumduk_rt', $data);
	}

	function get_kk_rw()
	{
		$link = $this->urlserver."webservice/kk/kk_rw.php";
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/kk_rw', $data);
	}
	function get_kk_rt()
	{
		$rw = $_GET['rw'];
		$link = $this->urlserver."webservice/kk/kk_rt_var.php?id_rw=".$rw;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/kk_rt', $data);
	}

	function get_pddk_rw()
	{
		$id = $_GET['id'];
		$link = $this->urlserver."webservice/pendidikan/pddk_rw.php?id_pddk=".$id;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/pddk_rw', $data);
	}
	function get_pddk_rt()
	{
		$id = $_GET['id'];
		$rw = $_GET['rw'];
		$link = $this->urlserver."webservice/pendidikan/pddk_rt_var.php?id_rw=".$rw.'&id_pddk='.$id;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/pddk_rt', $data);
	}
	function get_pddk_pie()
	{
		$link = $this->urlserver."webservice/pendidikan/pddk_rw_all.php";
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/pddk_pie', $data);
	}

	function get_perker_rw()
	{
		$id = $_GET['id'];
		$link = $this->urlserver."webservice/pekerjaan/pekerjaan_rw.php?id=".$id;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/perker_rw', $data);
	}
	function get_perker_rt()
	{
		$id = $_GET['id'];
		$rw = $_GET['rw'];
		$link = $this->urlserver."webservice/pekerjaan/pekerjaan_rt_var.php?id_rw=".$rw.'&id='.$id;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/perker_rt', $data);
	}
	function get_perker_pie()
	{
		$link = $this->urlserver."webservice/pekerjaan/pekerjaan_rw_all.php";
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/perker_pie', $data);
	}

	function get_agama_rw()
	{
		$id = $_GET['id'];
		$link = $this->urlserver."webservice/agama/agama_rw.php?id=".$id;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/agama_rw', $data);
	}
	function get_agama_rt()
	{
		$id = $_GET['id'];
		$rw = $_GET['rw'];
		$link = $this->urlserver."webservice/agama/agama_rt_var.php?id_rw=".$rw.'&id='.$id;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/agama_rt', $data);
	}
	function get_agama_pie()
	{
		$link = $this->urlserver."webservice/agama/agama_rw_all.php";
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;

		$this->load->view('chart/agama_pie', $data);
	}
}
?>