<?php


class Settings_CA_model extends CI_Model
{
	function update($data, $id)
	{
		$this->db->where('caregiverID', $id);
		$this->db->update('caregiver', $data);
	}
}
