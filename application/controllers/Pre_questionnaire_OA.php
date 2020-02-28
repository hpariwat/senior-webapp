<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pre_questionnaire_OA extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('oa_id')) redirect('landing');
	}

	public function index()
	{
		$this->load->view('pre_questionnaire_OA');
	}
}
