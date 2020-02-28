<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_OA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('oa_id')) redirect('home_OA');
		$this->load->library('form_validation');
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login_OA');
	}

	public function validation()
	{
		$this->form_validation->set_rules('user_room_number', 'Room Number', 'required|numeric');
		$this->form_validation->set_rules('user_pincode', 'Pincode', 'required|numeric');
		if($this->form_validation->run())
		{
			$room_number = $this->input->post('user_room_number');
			$pincode = $this->input->post('user_pincode');
			$result = $this->login_model->can_login($room_number, $pincode);
			if($result == '')
			{
				redirect('home_OA');
			}
			else
			{
				$this->session->set_flashdata('message', $result);
				redirect('login_OA');
			}
		}
		else
		{
			$this->index();
		}
	}
}

