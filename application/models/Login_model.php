<?php

class Login_model extends CI_Model
{
	function can_login($room_number, $pincode)
	{
		$query = $this->db->get_where('older_adult', array('room_number'=>$room_number));
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				if($pincode == $row->pincode)
				{
					$this->session->set_userdata('oa_id', $row->olderAdultID);
					$this->session->set_userdata('oa_first_name', $row->first_name);
					$this->session->set_userdata('oa_last_name', $row->last_name);
					$this->session->set_userdata('oa_room_number', $row->room_number);
					$this->session->set_userdata('oa_birthdate', $row->birthdate);
					$this->session->set_userdata('lang', $row->language);
					$this->session->set_userdata('oa_last_question', 0);
				}
		else
				{
					if($_SESSION['lang']=="nl")
						return 'Uw code is verkeerd';
					else
						return"Your password is wrong";
				}
			}
		}
		else
		{

			if($_SESSION['lang']=="nl")
				return 'Uw kamer nummer is verkeerd';
			else
				return"Your room number is wrong";
		}
	}

	function login_CA($email, $password)
	{
		$query = $this->db->get_where('caregiver', array('email'=>$email));
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				if($row->is_email_verified == 'yes')
				{
					// Check if the hashed password is the same as the given password
					if(password_verify($password, $row->password))
					{
						//$this->session->set_userdata('id', $row->id);
						$this->session->set_userdata('ca_id', $row->caregiverID);
						$this->session->set_userdata('ca_first_name', $row->first_name);
						$this->session->set_userdata('ca_last_name', $row->last_name);
						$this->session->set_userdata('ca_email', $row->email);
						$this->session->set_userdata('ca_is_email_verified', $row->is_email_verified);
						$this->session->set_userdata('ca_function', $row->function);
						$this->session->set_userdata('lang', $row->language);
						return '';
					}
					else
					{
						if($_SESSION['lang']=="nl")
							return 'Fout wachtwoord';
						else
							return"Wrong Password";
					}
				}
				else
				{
					if($_SESSION['lang']=="nl")
						return 'Verifieer eerst uw e-mailadres';
					else
						return"First verify your email address";
					//return 'First verify your email address';
				}
			}
		}
		else
		{
			if($_SESSION['lang']=="nl")
				return 'Verkeerd e-mailadres';
			else
				return 'Wrong Email Address';
		}
	}
}

?>
