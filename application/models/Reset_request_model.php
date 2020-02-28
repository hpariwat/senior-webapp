<?php
class Reset_request_model extends CI_Model
{

	function set_token($email, $data)
	{
		//UPDATE caregiver
		//SET token = $token WHERE email = $email
		$this->db->where('email', $email);
		return $this->db->update('caregiver', $data);
	}

	function verify_token($token)
	{
		$this->db->where('token', $token);
		$query = $this->db->get('caregiver');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function update_password($token, $data) // insert data into table in the row with token
	{
		$this->db->where('token', $token);
		$this->db->update('caregiver', $data);
	}
}
?>
