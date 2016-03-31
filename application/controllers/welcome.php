<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function index()
	{
		$data['point'] = $this->db->get_where('t_layer', array('tipe'=>'marker'));
		$data['shape'] = $this->db->get_where('t_layer', array('tipe'=>'polygon'));
		$data['konten'] = 'gmaps';
		$this->load->view('welcome_message', $data);
	}

	function dashboard()
	{
		$data['konten'] = 'backend_map';
		$this->load->view('welcome_message', $data);
	}

	function grafik()
	{
		$this->load->helper('api_db');
		$data['konten'] = 'grafik';
		$this->load->view('welcome_message', $data);
	}

	function simpan()
	{
		$save = array(
			'kordinat' => $this->input->post('kordinat'),
			'tipe' => $this->input->post('tipe')
			);

		$this->db->insert('t_layer', $save);
		redirect('welcome/dashboard');
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