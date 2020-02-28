<?php
class Register_CA_model extends CI_Model
{
	function insert($data) // insert data into table
	{
		$this->db->insert('caregiver', $data); // insert $data into 'caregiver' table
		return $this->db->insert_id(); // return last inserted record id
	}

	function verify_email($key)
	{
		$this->db->where('verification_key', $key);
		$this->db->where('is_email_verified', 'no');
		$query = $this->db->get('caregiver');
		if($query->num_rows() > 0)
		{
			$data = array(
				'is_email_verified'  => 'yes'
			);
			$this->db->where('verification_key', $key);
			$this->db->update('caregiver', $data);
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>
