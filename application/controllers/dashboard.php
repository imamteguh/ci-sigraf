<?php
/**
* Author Imam Teguh
* dashboard and admin page
*/
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('supermodel');
		if($this->session->userdata('get_login')=="") {
			$this->session->set_set_flashdata('error','<div class="alert alert alert-danger">Mohon maaf anda tidak mempunyai akses..</div>');
			redirect('login/index');
		}
	}

	// dashboard
	function index()
	{
		$data['link'] = 'dashboard/beranda';
		$this->load->view('admin/template', $data);
	}
	function beranda()
	{
		$this->load->view('admin/dashboard');
	}


	// data layer
	function data_layer()
	{
		$data['link'] = 'dashboard/map_layer';
		$this->load->view('admin/template', $data);
	}
	function map_layer()
	{
		$data['listdata'] = $this->supermodel->queryManual("SELECT * FROM map_layer ORDER BY judul ASC");
		$data['status'] = array('Aktif','Tidak Aktif');
		$this->load->view('admin/map_layer', $data);
	}


	// data point
	function data_point()
	{
		$data['link'] = 'dashboard/map_point';
		$this->load->view('admin/template', $data);
	}
	function map_point()
	{
		$data['listdata'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori");
		$this->load->view('admin/map_point', $data);
	}



	// galeri
	function galeri($aksi=NULL)
	{
		$id = $this->uri->segment(4);
		if ($aksi=="save") {
			$this->form_validation->set_rules('nm_kegiatan','Nama Kegiatan','required');
			if($this->form_validation->run()===TRUE) {
				if(!empty($_FILES['foto']['name']))
				{
					$ext = end(explode(".", $_FILES['foto']['name']));
					$rand = rand(000,999);
					$name = date("Ymd").$rand.'.'.$ext;
					$unggah = $this->supermodel->unggah_gambar('galeri/','foto',$name,true);
					if($unggah===false) {
						$pesan = "Error.. upload foto gagal";
						$this->session->set_flashdata('msg','<div class="alert alert-danger">'.$pesan.'</div>');
						redirect('dashboard/galeri/');
					} else {
						$cek = $this->supermodel->queryManual("SELECT * FROM galeri WHERE id='$id' ")->row();
						if($cek->foto!='') {
							@unlink('./uploads/galeri/'.$cek->foto);
							@unlink('./uploads/galeri/thumb/'.$cek->foto);
						}

						$in['nm_kegiatan'] = $this->input->post('nm_kegiatan');
						$in['foto'] = $name;

						if($id=='') {
							$this->supermodel->insertData('galeri',$in);
						} else {
							$this->supermodel->updateData('galeri',$in,'id',$id);
						}
						$pesan = "Sukses.. data tersimpan";
						$this->session->set_flashdata('msg','<div class="alert alert-success">'.$pesan.'</div>');
						redirect('dashboard/galeri/');
					}
					
				} elseif(!empty($_POST['infoto']) && empty($_FILES['foto']['name'])) {
					$in['nm_kegiatan'] = $this->input->post('nm_kegiatan');
					$this->supermodel->updateData('galeri',$in,'id',$id);
					$pesan = "Sukses.. data tersimpan";
					$this->session->set_flashdata('msg','<div class="alert alert-success">'.$pesan.'</div>');
					redirect('dashboard/galeri/');
				} else {
					$pesan = "Error.. foto belum dipilih";
					$this->session->set_flashdata('msg','<div class="alert alert-danger">'.$pesan.'</div>');
					redirect('dashboard/galeri/');
				}
			}
		}
		$data['link'] = 'galeri/tampil/'.$aksi.'/'.$id;
		$this->load->view('admin/template', $data);
	}



	// editor peta
	function editor_peta()
	{
		$this->form_validation->set_rules('kordinat', 'Kordinat', 'required');
		if($this->form_validation->run()===TRUE)
		{
			$name = '';
			$kordinat = $this->input->post('kordinat');
			$tipe = $this->input->post('tipe');

			if($tipe=="marker") {
				if(!empty($_FILES['fotopt']['name'])) {
					$ext = end(explode(".", $_FILES['fotopt']['name']));
					$rand = rand(000,999);
					$name = date("Ymd").$rand.'.'.$ext;
					$unggah = $this->supermodel->unggah_gambar('peta/','fotopt',$name,false);
				} 

				$in = array(
					'koordinat' => $kordinat,
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'id_kategori' => $this->input->post('id_kategori'),
					'foto' => $name
					);

				$this->supermodel->insertData('map_point', $in);
			}
			elseif($tipe=="polygon") {

				if(!empty($_FILES['fotoar']['name'])) {
					$ext = end(explode(".", $_FILES['fotoar']['name']));
					$rand = rand(000,999);
					$name = date("Ymd").$rand.'.'.$ext;
					$unggah = $this->supermodel->unggah_gambar('peta/','fotoar',$name,false);
				} 
				
				$in = array(
					'koordinat' => $kordinat,
					'judul' => $this->input->post('judul'),
					'link' => $this->input->post('link'),
					'warna' => $this->input->post('warna'),
					'foto' => $name
					);

				$this->supermodel->insertData('map_layer', $in);
			}

			redirect('dashboard/editor_peta');
		}

		$data['link'] = 'dashboard/tampil_peta';
		$this->load->view('admin/template', $data);
	}
	function tampil_peta()
	{
		$data['kategori'] = $this->supermodel->queryManual('SELECT * FROM map_kategori ORDER BY nm_kategori ASC');
		$this->load->view('admin/editor_peta', $data);
	}




	// hapus data table
	function hapus()
	{
		$table = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$gambar = $this->uri->segment(5);

		if (!empty($table) && !empty($id)) {
			# code...
			if($gambar!='') {
				$cek = $this->supermodel->queryManual("SELECT * FROM $table WHERE id='$id' ")->row();
				if($cek->foto!='') {
					@unlink('./uploads/'.$table.'/'.$cek->foto);
					@unlink('./uploads/'.$table.'/thumb/'.$cek->foto);
				}
			}
			$hapus = $this->supermodel->deleteData($table, 'id', $id);
			if ($hapus) {
				# code...

				$pesan = "Sukses.. data terhapus";
				$this->session->set_flashdata('msg','<div class="alert alert alert-success">'.$pesan.'</div>');
			} else {
				$pesan = "Error.. data tidak terhapus";
				$this->session->set_flashdata('msg','<div class="alert alert alert-danger">'.$pesan.'</div>');
			}
		} else {
			$pesan = "Error... query gagal dijalankan";
			$this->session->set_flashdata('msg','<div class="alert alert alert-danger">'.$pesan.'</div>');
		}

		echo "<script>window.location.href = document.referrer;</script>";
	}



	// logout
	function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
?>