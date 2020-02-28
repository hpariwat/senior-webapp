<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_CA extends CI_Controller
{
	public function __construct() // constructor
	{
		parent::__construct(); // parent constructor
		if($this->session->userdata('id')) redirect('home');
		$this->load->library('form_validation'); // imports
		$this->load->model('Register_CA_model');
	}

	public function index() // root function of this class
	{
		$this->load->view('register_CA'); //output register_CA.php in view
	}

	public function validation()
	{
		// checks this field has value or not, if it's blank then validation error
		$this->form_validation->set_rules('user_first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('user_last_name', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email|is_unique[caregiver.email]');
		$this->form_validation->set_rules('user_language', 'Language', 'required|trim|alpha|exact_length[2]');
		$this->form_validation->set_rules('user_password', 'Password', 'required');
		$this->form_validation->set_rules('user_function', 'Function', 'required|trim');
		if($this->form_validation->run()) // run validator
		{
			$verification_key = md5(rand());
			$hashed_password = password_hash($this->input->post('user_password'), PASSWORD_BCRYPT); // hash the password
			$data = array(
				'first_name' => $this->input->post('user_first_name'),
				'last_name' => $this->input->post('user_last_name'),
				'email' => $this->input->post('user_email'),
				'language' => $this->input->post('user_language'),
				'password' => $hashed_password,
				'verification_key' => $verification_key,
				'function' => $this->input->post('user_function')
			);
			$data = array_map(function($s){ return htmlspecialchars($s); }, $data);
			$data = $this->security->xss_clean($data);
			$id = $this->Register_CA_model->insert($data); // insert into database
			if($id > 0)
			{
				// Sending verification email to user_email
				if($this->input->post('user_language') == 'en') {
					$subject = "Please verify your email address";
					$message = "
    			<p>Hello " . $this->input->post('user_first_name') . "</p>
    			<p>This is an email to confirm your email address. Click on the link here to verify it is you. <a href='" . base_url() . "index.php/Register_CA/verify_email/" . $verification_key . "'>link</a>.</p>
    			<p>Once you click on this link your email will be verified and you can login into the website.</p>
    			<p>Thanks,</p>";
				} elseif($this->input->post('user_language') == 'nl'){
					$subject = "Verifieer uw e-mailadres";
					$message = "
    			<p>Hallo " . $this->input->post('user_first_name') . "</p>
    			<p>Dit is een bevestigingsmail voor het aanmeken van een gebruikersprofiel. Druk op de volgende link om dit e-mailadres te verifieren. <a href='" . base_url() . "index.php/Register_CA/verify_email/" . $verification_key . "'>link</a>.</p>
    			<p>Na het verifieren van uw e-mailadres kunt u zich aanmelden op de website.</p>
    			<p>Met vriendelijke groeten</p>";
				}
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
					$this->session->set_flashdata('message', 'Check in your email (and spam folder) for email verification mail');
					redirect('register_CA');
				}
			}
		}
		else
		{
			$this->index();
		}
	}

	public function verify_email()
	{
		if($this->uri->segment(3))
		{
			$verification_key = $this->uri->segment(3);
			if($this->Register_CA_model->verify_email($verification_key))
			{
				$data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'index.php/login_CA/index">here</a></h1>';
			}
			else
			{
				$data['message'] = '<h1 align="center">Invalid Link</h1>';
			}
			$this->load->view('email_verification', $data);
		}
	}

}

