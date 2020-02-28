<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_CA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('ca_id')) redirect('landing');
	}

	public function index()
	{
		$this->load->view('settings_CA');
	}

	public function validation()
	{
		$this->load->model('Settings_CA_model');

		$data = array(
			'first_name' => $this->input->post('c_first_name'),
			'last_name' => $this->input->post('c_last_name'),
			'function' => $this->input->post('c_function'),
		);

		$_SESSION['ca_first_name'] = $this->security->xss_clean(htmlspecialchars($this->input->post('c_first_name')));
		$_SESSION['ca_last_name'] = $this->security->xss_clean(htmlspecialchars($this->input->post('c_last_name')));
		$_SESSION['ca_function'] = $this->security->xss_clean(htmlspecialchars($this->input->post('c_function')));

		$data = array_map(function($s){ return htmlspecialchars($s); }, $data);
		$data = $this->security->xss_clean($data);

		$this->Settings_CA_model->update($data, $this->input->post('c_user_id'));
		redirect('settings_CA');
	}
}
