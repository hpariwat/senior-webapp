<?php

include 'ChromePhp.php';
class Login_CA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('ca_id'))
		{
			redirect('home_CA');
		}
		$this->load->library('form_validation');
		$this->load->model('Login_model');
	}

	public function index(){
		$this->load->view('login_CA');
	}

	public function validation(){
		$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim');
		$this->form_validation->set_rules('user_password', 'Password', 'required|trim');

		if($this->form_validation->run())
		{
			$email = $this->input->post('user_email');
			$password = $this->input->post('user_password');
			$result = $this->Login_model->login_CA($email, $password);
			if($result == '')
			{
				redirect('home_CA');
			}
			else
			{
				$this->session->set_flashdata('message', $result);
				redirect('login_CA');
			}
		}
		else
		{
			$this->index();
		}
	}

}
