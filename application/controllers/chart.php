<?php

/**
* 
*/
class Chart extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->helper('api_db');
	}

	function jumduk_rw()
	{
		$this->load->view('chart/jumduk_rw');
	}
}

?>