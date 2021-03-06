<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('supermodel');
	}

	function spash()
	{
		$data['slide'] = $this->supermodel->queryManual("SELECT * FROM slide WHERE status=1 ORDER BY id DESC");
		$data['news'] = $this->supermodel->queryManual("SELECT * FROM pengumuman WHERE status=1 ORDER BY id DESC");
		$this->load->view('spashscreen', $data);
	}

	function galeri()
	{
		$data['listdata'] = $this->supermodel->queryManual("SELECT * FROM galeri ORDER BY id DESC");
		$data['konten'] = 'galeri';
		$this->load->view('welcome_message', $data);
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
	function grafik_pddk()
	{
		$data['kategori'] = $this->supermodel->queryManual("SELECT * FROM kat_pend");
		$data['konten'] = 'grafik_pddk';
		$this->load->view('welcome_message', $data);
	}
	function grafik_perker()
	{
		$data['kategori'] = $this->supermodel->queryManual("SELECT * FROM kat_perker");
		$data['konten'] = 'grafik_perker';
		$this->load->view('welcome_message', $data);
	}
	function grafik_agama()
	{
		$data['kategori'] = $this->supermodel->queryManual("SELECT * FROM kode_agama");
		$data['konten'] = 'grafik_agama';
		$this->load->view('welcome_message', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */