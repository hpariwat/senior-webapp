<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_Categories_CA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('ca_id')) redirect('landing');
	}

	public function index()
	{
		$this->load->view('statistics_categories_ca');
	}
}
