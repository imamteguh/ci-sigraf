<?php
/**
* Author Imam Teguh
* Slide Controller
*/
class Slide extends CI_Controller
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

	function index($aksi=NULL)
	{
		$id = $this->uri->segment(4);
		if ($aksi=="save") {
			$this->form_validation->set_rules('judul','Judul','required');
			if($this->form_validation->run()===TRUE) {
				if(!empty($_FILES['foto']['name']))
				{
					$ext = end(explode(".", $_FILES['foto']['name']));
					$rand = rand(000,999);
					$name = date("Ymd").$rand.'.'.$ext;
					$unggah = $this->supermodel->unggah_gambar('slide/','foto',$name,true);
					if($unggah===false) {
						$pesan = "Error.. upload foto gagal";
						$this->session->set_flashdata('msg','<div class="alert alert-danger">'.$pesan.'</div>');
						redirect('slide/index');
					} else {
						$cek = $this->supermodel->queryManual("SELECT * FROM slide WHERE id='$id' ")->row();
						if($cek->foto!='') {
							@unlink('./uploads/slide/'.$cek->foto);
							@unlink('./uploads/slide/thumb/'.$cek->foto);
						}

						$in['judul'] = $this->input->post('judul');
						$in['status'] = $this->input->post('status');
						$in['foto'] = $name;

						if($id=='') {
							$this->supermodel->insertData('slide',$in);
						} else {
							$this->supermodel->updateData('slide',$in,'id',$id);
						}
						$pesan = "Sukses.. data tersimpan";
						$this->session->set_flashdata('msg','<div class="alert alert-success">'.$pesan.'</div>');
						redirect('slide/index');
					}
					
				} elseif(!empty($_POST['infoto']) && empty($_FILES['foto']['name'])) {
					$in['judul'] = $this->input->post('judul');
					$in['status'] = $this->input->post('status');
					$this->supermodel->updateData('slide',$in,'id',$id);
					$pesan = "Sukses.. data tersimpan";
					$this->session->set_flashdata('msg','<div class="alert alert-success">'.$pesan.'</div>');
					redirect('slide/index');
				} else {
					$pesan = "Error.. foto belum dipilih";
					$this->session->set_flashdata('msg','<div class="alert alert-danger">'.$pesan.'</div>');
					redirect('slide/index');
				}
			}
		}

		$data['link'] = 'slide/tampil/'.$aksi.'/'.$id;
		$this->load->view('admin/template', $data);
	}

	function tampil()
	{
		$id = $this->uri->segment(4);
		
		$data['list'] = array(
			'id'=>'',
			'judul'=>'',
			'foto'=>'',
			'status'=>''
			);

		if($id!='') {
			$list = $this->supermodel->queryManual("SELECT * FROM slide WHERE id='$id' ");
			if ($list->num_rows()==1) {
				$data['list'] = $list->row_array();
			}
		}
		$data['status'] = array('Non Aktif', 'Aktif');
		$data['listdata'] = $this->supermodel->queryManual("SELECT * FROM slide ORDER BY id DESC");
		$this->load->view('admin/slide', $data);
	}
}
?>