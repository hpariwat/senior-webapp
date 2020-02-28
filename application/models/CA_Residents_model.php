<?php


class CA_Residents_model extends CI_Model
{
	function get_resident_info($olderAdultID)
	{
		$query = $this->db->get_where("older_adult", array("olderAdultID"=>($olderAdultID)));
		return $query->result_array();
	}

	function get_all_residents()
	{
		$this->db->select('room_number, first_name, last_name, birthdate');
		//$this->db->order_by('olderAdultID');
		return $this->db->get('older_adult')->result_array(); // query table
	}

	function get_count() {
		return $this->db->count_all('older_adult');
	}

	function insert($data)
	{
		if($this->db->select()->where('room_number', $data['room_number'])->count_all_results('older_adult') == 0) {
			return $this->db->insert('older_adult', $data);
		} else {
			return false;
		}
	}

	function inactive($oaid){
		$this->db->set('active', 0)->where('olderAdultID', $oaid)->update('older_adult');
	}
}
