<?php
/**
* Author Imam Teguh
* galeri controller
*/
class Galeri extends CI_Controller
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

	function tampil($aksi=NULL)
	{
		$id = $this->uri->segment(4);
		
		$data['list'] = array(
			'id'=>'',
			'nm_kegiatan'=>'',
			'foto'=>''
			);

		if($id!='') {
			$list = $this->supermodel->queryManual("SELECT * FROM galeri WHERE id='$id' ");
			if ($list->num_rows()==1) {
				$data['list'] = $list->row_array();
			}
		}
		$data['listdata'] = $this->supermodel->queryManual("SELECT * FROM galeri ORDER BY id DESC");
		$this->load->view('admin/galeri', $data);
	}
}
?>