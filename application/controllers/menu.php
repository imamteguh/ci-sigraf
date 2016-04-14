<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('supermodel');
	}

	function index($slug=NULL)
	{
		$data['row'] = $this->supermodel->queryManual("SELECT * FROM post inner join menu on post.id=menu.id WHERE menu.slug='$slug' ")->row_array();
		$data['konten'] = 'post';
		$this->load->view('welcome_message', $data);
	}

}

?>