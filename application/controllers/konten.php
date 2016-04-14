<?php
/**
* Author Imam Teguh
* Konten Controller
*/
class Konten extends CI_Controller
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

	function index()
	{
		$id = $this->uri->segment(3);

		$this->form_validation->set_rules('judul','Judul','required');
		if($this->form_validation->run()===TRUE) {
			$in['judul'] = $this->input->post('judul');
			$in['deskripsi'] = $this->input->post('deskripsi');
			$in['tanggal'] = date('Y-m-d');

			$this->supermodel->updateData('post',$in,'id',$id);

			$pesan = "Sukses.. data tersimpan";
			$this->session->set_flashdata('msg','<div class="alert alert-success">'.$pesan.'</div>');
			redirect('konten/index/'.$id);
		}


		$data['link'] = 'konten/tampil/'.$id;
		$this->load->view('admin/template', $data);
	}

	function tampil()
	{
		$id = $this->uri->segment(3);

		if($id!='') {
			$list = $this->supermodel->queryManual("SELECT * FROM post inner join menu on post.id=menu.id WHERE menu.id='$id' ");
			if ($list->num_rows()==1) {
				$data['list'] = $list->row_array();
			}
		}

		$this->load->view('admin/konten_edit', $data);
	}
}

?>