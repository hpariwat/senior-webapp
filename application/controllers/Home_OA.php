<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_OA extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('oa_id')) redirect('landing');
	}

	public function index()
	{
		$this->load->view('home_OA');
	}

	public function logout()
	{
		$data = $this->session->all_userdata();
		foreach($data as $row => $rows_value)
		{
			$this->session->unset_userdata($row);
		}
		redirect('landing');
	}
}

