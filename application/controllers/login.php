<?php
/**
* Author Imam Teguh
* login Page
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('supermodel');
	}

	function index()
	{
		$this->load->view('login_page');
	}

	function go()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()===TRUE)
		{
			$user = $this->input->post('username');
			$pass = md5($this->input->post('password'));

			$login = $this->supermodel->queryManual("SELECT * FROM user WHERE username='$user' OR email='$user' AND password='$pass'");

			if ($login->num_rows()==1) {
				$row = $login->row_array();

				$sess['get_login'] = 'YesIdidIt';
				$sess['username'] = $row['username'];
				$sess['email'] = $row['email'];
				$sess['nama'] = $row['nama'];

				$this->session->set_userdata($sess);
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('error','<div class="alert alert-danger">Mohon maaf username atau password anda tidak terdaftar..</div>');
				redirect('login/index');
			}
		}

		$this->index();
	}
}
?>