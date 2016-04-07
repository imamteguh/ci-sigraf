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
			$this->session->set_set_flashdata('error','<div class="alert alert-danger">Mohon maaf anda tidak mempunyai akses..</div>');
			redirect('login/index');
		}
	}

	function index()
	{
		$data['konten'] = 'admin/dashboard';
		$this->load->view('admin/template', $data);
	}

	function data_layer()
	{
		$data['listdata'] = $this->supermodel->queryManual("SELECT * FROM map_layer ORDER BY judul ASC");
		$data['status'] = array('Aktif','Tidak Aktif');
		$data['konten'] = 'admin/map_layer';
		$this->load->view('admin/template', $data);
	}

	function data_point()
	{
		$data['listdata'] = $this->supermodel->queryManual("SELECT * FROM map_point a, map_kategori b WHERE a.id_kategori=b.id_kategori");
		// $data['status'] = array('Aktif','Tidak Aktif');
		$data['konten'] = 'admin/map_point';
		$this->load->view('admin/template', $data);
	}

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
						$this->session->set_flashdata('msg','<div class="alert-danger>'.$pesan.'</div>');
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
						$this->session->set_flashdata('msg','<div class="alert-success>'.$pesan.'</div>');
						redirect('dashboard/galeri/');
					}
					
				} elseif(!empty($_POST['infoto']) && empty($_FILES['foto']['name'])) {
					$in['nm_kegiatan'] = $this->input->post('nm_kegiatan');
					$this->supermodel->updateData('galeri',$in,'id',$id);
					$pesan = "Sukses.. data tersimpan";
					$this->session->set_flashdata('msg','<div class="alert-success>'.$pesan.'</div>');
					redirect('dashboard/galeri/');
				} else {
					$pesan = "Error.. foto belum dipilih";
					$this->session->set_flashdata('msg','<div class="alert-danger>'.$pesan.'</div>');
					redirect('dashboard/galeri/');
				}
			}
		}

		$data['list'] = array(
			'id'=>'',
			'nm_kegiatan'=>'',
			'foto'=>''
			);

		if($id!='') {
			$data['list'] = $this->supermodel->queryManual("SELECT * FROM galeri WHERE id='$id' ")->row_array();
		}
		$data['listdata'] = $this->supermodel->queryManual("SELECT * FROM galeri ORDER BY id DESC");
		$data['konten'] = 'admin/galeri';
		$this->load->view('admin/template', $data);
	}

	function editor_peta()
	{
		$this->form_validation->set_rules('kordinat', 'Kordinat', 'required');
		if($this->form_validation->run()===TRUE)
		{
			$kordinat = $this->input->post('kordinat');
			$tipe = $this->input->post('tipe');
			if($tipe=="marker") {
				$in = array(
					'koordinat' => $kordinat,
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'id_kategori' => $this->input->post('id_kategori')
					);

				$this->supermodel->insertData('map_point', $in);
			}
			elseif($tipe=="polygon") {
				$in = array(
					'koordinat' => $kordinat,
					'judul' => $this->input->post('judul'),
					'link' => $this->input->post('link'),
					'warna' => $this->input->post('warna')
					);

				$this->supermodel->insertData('map_layer', $in);
			}

			redirect('dashboard/editor_peta');
		}

		$data['kategori'] = $this->supermodel->queryManual('SELECT * FROM map_kategori ORDER BY nm_kategori ASC');
		$data['konten'] = 'admin/editor_peta';
		$this->load->view('admin/template', $data);
	}

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
					@unlink('./uploads/galeri/'.$cek->foto);
					@unlink('./uploads/galeri/thumb/'.$cek->foto);
				}
			}
			$hapus = $this->supermodel->deleteData($table, 'id', $id);
			if ($hapus) {
				# code...

				$pesan = "Sukses.. data terhapus";
				$this->session->set_flashdata('msg','<div class="alert alert-success>'.$pesan.'</div>');
			} else {
				$pesan = "Error.. data tidak terhapus";
				$this->session->set_flashdata('msg','<div class="alert alert-danger>'.$pesan.'</div>');
			}
		} else {
			$pesan = "Error... query gagal dijalankan";
			$this->session->set_flashdata('msg','<div class="alert alert-danger>'.$pesan.'</div>');
		}

		echo "<script>window.history.back();</script>";
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
?>