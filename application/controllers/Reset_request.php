<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_request extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Reset_request_model');
	}

	public function index() // root function of this class
	{
		$this->load->view('reset_password_request'); //output register.php in view
	}

	public function forgot_password()
	{
		// checks this field has value or not, if it's blank then validation error
		$this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email');

		if($this->form_validation->run()) // run validator
		{
			$email = $this->input->post('user_email');
			$token = md5(rand());
			$data = array(
				'token' => $token
			);
			$email = $this->security->xss_clean(htmlspecialchars($email));
			$id = $this->Reset_request_model->set_token($email, $data); // insert into database
			if($id == true)
			{
				$subject = "Reset your password";
				$message = "
    			<p>Hi!</p>
    			<p>This is an email to change your password. You can change your password by clicking on this <a href='".base_url()."index.php/Reset_request/verify_token/".$token."'>link</a>.</p>
    			<p>You will be redirected to a page where you can register a new password.</p>
    			<p>Have a nice day!</p>
    			<p>Best regards, Team 1</p>
    			";
				$config = array(
					'protocol'  => 'smtp',
					'smtp_host' => 'smtp.kuleuven.be',
					'smtp_port' => 25,
					'mailtype'  => 'html',
					'charset'    => 'iso-8859-1',
					'wordwrap'   => TRUE
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('a19ux1@gmail.com');
				$this->email->to($this->input->post('user_email'));
				$this->email->subject($subject);
				$this->email->message($message);
				if($this->email->send())
				{
					$this->session->set_flashdata('message', 'An email had been sent to your e-mail address with a link to reset your password.');
					redirect('/reset_request');
				}
			}
			echo 'California rest in peace';
		}
		else
		{
			$this->index();
		}
	}

	public function verify_token()
	{
		if($this->uri->segment(3))
		{
			$token = $this->uri->segment(3);
			$this->session->set_userdata('token', $token);
			if($this->Reset_request_model->verify_token($token))
			{
				$this->load->view('change_password');
			}
			else
			{
				$data['message'] = '<h1 align="center">Invalid link</h1>';
				$this->load->view('email_verification', $data);
			}
		}
	}

	public function change_password()
	{
			$hashed_password = password_hash($this->input->post('user_new_password'), PASSWORD_BCRYPT);
			$data = array(
				'password' => $hashed_password
			);
			$this->Reset_request_model->update_password($this->session->token, $data);
			$this->session->set_flashdata('message', 'Your password has been changed.');
			$this->session->unset_userdata('token');
			redirect('login_CA');
	}
}

