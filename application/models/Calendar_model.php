<?php


class Calendar_model extends CI_Model
{
	function get_events()
	{
		$this->db->order_by('eventID');
		return $this->db->get('event')->result_array(); // query table
	}

	function get_attendants_count($id)
	{
		$this->db->where('eventID', $id);
		return $this->db->get('attendance')->num_rows();
	}

	function insert_event($data)
	{
		$this->db->insert('event', $data);
		return $this->db->insert_id(); // return auto-generated id
	}

	function get_id()
	{
		$query = $this->db->query('SELECT AUTO_INCREMENT FROM information_schema.TABLES 
								WHERE TABLE_SCHEMA = "a19ux1" AND TABLE_NAME = "event"');
		$row = $query->row();
		return $row->AUTO_INCREMENT;
	}

	function insert_occurrence($data)
	{
		$this->db->insert('occurrence', $data);
	}

	function update_event($data, $id)
	{
		$this->db->where('eventID', $id);
		$this->db->update('event', $data);
	}

	function delete_event($id)
	{
		$this->db->where('eventID', $id);
		$this->db->delete('event');
	}

	function delete_repeating_event($id)
	{
		$this->db->where('group_ID', $id);
		$this->db->delete('event');
	}

	function join_event($data)
	{
		$this->db->insert('attendance', $data);
	}

	function unjoin_event($eventID, $olderAdultID)
	{
		$this->db->where('eventID', $eventID);
		$this->db->where('olderAdultID', $olderAdultID);
		$this->db->delete('attendance');
	}

	function show_participants($eventID)
	{
		$query = $this->db->get_where("attendance", array("eventID"=>($eventID)));
		return $query->result_array();
	}

	function show_events_for_resident($olderAdultID)
	{
		$query = $this->db->get_where("attendance", array("olderAdultID" => ($olderAdultID)));
		return $query->result_array();
	}
}
