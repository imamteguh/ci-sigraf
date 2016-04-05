<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('supermodel');
	}

	function index()
	{
		$data['point'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori");
		$data['konten'] = 'gmaps';
		$this->load->view('welcome_message', $data);
	}

	function grafik()
	{
		$this->load->helper('api_db');
		$data['konten'] = 'grafik';
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
		$this->load->view('highchart');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */