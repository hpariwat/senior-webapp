<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		($this->session->lang=="en") ? $this->lang->load('landing',"english") :$this->lang->load('landing',"dutch");
	}

	public function index()
	{
		$this->load->view('landing');
	}
}

