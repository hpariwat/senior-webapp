<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_email_CA extends CI_Controller
{
	public function __construct() // constructor
	{
		parent::__construct(); // parent constructor
		$this->load->library('form_validation'); // imports
		$this->load->library('session'); //imports
		$this->load->model('Change_email_model');
	}

	public function index() // root function of this class
	{
		$this->load->view('change_email'); //output change_email.php in view
	}

	public function change_email()
	{
		$this->form_validation->set_rules('user_new_email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('user_rep_new_email', 'Email', 'required|trim|valid_email');

		if($this->form_validation->run())
		{
			$email = $this->input->post('user_new_email');
			$verification_key = md5(rand());
			// Update Data
			if($this->Change_email_model->changemail($this->session->ca_email, $email, $verification_key)){
				// Sending verification email to user_email
				if($this->session->lang == 'en') {
					$subject = "Please verify email for login";
					$message = "
    			<p>Hello " . $this->session->ca_first_name . "</p>
    			<p>This is an email to confirm your new email address. Click on the link here to verify it is you. <a href='" . base_url() . "index.php/Register_CA/verify_email/" . $verification_key . "'>link</a>.</p>
    			<p>Once you click on this link your email will be verified and you can login into the website.</p>
    			<p>Thanks</p>";
				} else{
					$subject = "Verifieer uw nieuw e-mailadres";
					$message = "
    			<p>Hallo " . $this->session->ca_first_name . "</p>
    			<p>Dit is een bevestigingsmail voor het veranderen van uw e-mailadres. Druk op de volgende link om dit e-mailadres te verifieren. <a href='" . base_url() . "index.php/Register_CA/verify_email/" . $verification_key . "'>link</a>.</p>
    			<p>Na het verifiëren van uw e-mailadres kunt u terug aanmelden op de website.</p>
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
				$this->email->to($email);
				$this->email->subject($subject);
				$this->email->message($message);
				if($this->email->send())
				{
					redirect('home_CA');
				}
				echo "EN: Something went wrong here, please contact your administrator.<br>NL: Iets is hier fout gelopen, gelieve contact op te nemen met uw systeemadministrator.";
			}
		}
	}
}
