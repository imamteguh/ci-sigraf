<?php
/**
* Author Imam Teguh
* Pengumuman Controller
*/
class Pengumuman extends CI_Controller
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
				$in['judul'] = $this->input->post('judul');
				$in['deskripsi'] = $this->input->post('deskripsi');
				$in['status'] = $this->input->post('status');
				$in['tanggal'] = date('Y-m-d');

				if($id=='') {
					$this->supermodel->insertData('pengumuman',$in);
				} else {
					$this->supermodel->updateData('pengumuman',$in,'id',$id);
				}
				$pesan = "Sukses.. data tersimpan";
				$this->session->set_flashdata('msg','<div class="alert alert-success">'.$pesan.'</div>');
				redirect('pengumuman/index');
			}
		}


		$data['link'] = 'pengumuman/tampil/'.$aksi.'/'.$id;
		$this->load->view('admin/template', $data);
	}

	function tampil($aksi=NULL)
	{
		$id = $this->uri->segment(4);
		$data['list'] = array(
			'id'=>'',
			'judul'=>'',
			'deskripsi'=>'',
			'tanggal'=>'',
			'status'=>''
			);

		if($id!='') {
			$list = $this->supermodel->queryManual("SELECT * FROM pengumuman WHERE id='$id' ");
			if ($list->num_rows()==1) {
				$data['list'] = $list->row_array();
			}
		}

		$data['status'] = array('Non Aktif', 'Aktif');
		$data['listdata'] = $this->supermodel->queryManual("SELECT * FROM pengumuman ORDER BY id DESC");
		$this->load->view('admin/pengumuman', $data);
	}
}

?>