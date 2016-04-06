<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('supermodel');
	}

	function index()
	{
		$data['kantor'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori AND a.id_kategori=1");
		$data['sd'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori AND a.id_kategori=2");
		$data['smp'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori AND a.id_kategori=3");
		$data['sma'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori AND a.id_kategori=4");
		$data['univ'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori AND a.id_kategori=5");
		$data['wisata'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori AND a.id_kategori=6");
		$data['pasar'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori AND a.id_kategori=7");
		$data['bs'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori AND a.id_kategori=8");

		$data['kat'] = $this->supermodel->queryManual("SELECT * FROM map_kategori");
		$data['konten'] = 'gmaps';
		$this->load->view('welcome_message', $data);
	}

	function grafik_jumduk()
	{
		$this->load->helper('api_db');
		$data['konten'] = 'grafik';
		$this->load->view('welcome_message', $data);
	}
	function grafik_kk()
	{
		$data['konten'] = 'grafik_kk';
		$this->load->view('welcome_message', $data);
	}

	// xml polygon
	function api_area()
	{
		header("Content-type: text/xml");
		$data = $this->db->get_where('t_layer', array('tipe'=>'polygon'));

		echo '<markers>';
		foreach ($data->result() as $rows) {
			# code...
			echo '<marker ';
			echo 'coords="'.$rows->kordinat.'" ';
			echo 'warna="#666000" ';
			echo '/>';
		}
		echo '</markers>';
	}

	// ajax get chart
	function get_chart()
	{
		$rw = $_GET['id_rw'];
		$link = "http://192.168.152.116:8082/disduk/webservice/jumduk/rt_var.php?id_rw=".$rw;
		$konten = file_get_contents($link);
		$json_decode = json_decode($konten, true);

		$data['datax'] = $json_decode;
		$data['judul'] = $rw;

		$this->load->view('highchart', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */