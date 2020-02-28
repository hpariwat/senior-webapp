<?php


class CA_Home_model extends CI_Model
{
	function fetchActivities(){			//SELECT * FROM a19ux1.event where start_date >= '2019-11-29' limit 3;
		return $this->db->select()->from('event')->where('start_date >=', date("Y-m-d"))->order_by('start_date')->limit(3)->get();
	}

	function getnotes($caid, $funk){
		//select * from a19ux1.notes where (a19ux1.notes.noteID not in (select a19ux1.notes_hidden.noteID from a19ux1.notes_hidden where a19ux1.notes_hidden.caregiverID = 1) AND a19ux1.notes.caregiver = 1) OR (a19ux1.notes.me = 1 AND a19ux1.notes.authorID = 1);
		$sub = "("  . $this->db->select('noteID')->where('caregiverID', $caid)->get_compiled_select('notes_hidden') . "))";
		$query = $this->db->select()->from('notes')->where('('.$funk.' = 1 AND noteID NOT IN'.$sub)->or_where('(authorID = '. $caid.' AND me = 1)')->get();
		return $query;
	}

	function addNote($caid, $about = null, $note, $car, $ent, $vol, $me){ //add note and add entry in note_not_seen for view group
		$thing = array(
			'note' => $note,
			'about' => $about,
			'date' => date('Y-n-j'),
			'authorID' => $caid,
			'caregiver' => $car,
			'entertainer' => $ent,
			'volunteer' => $vol,
			'me' => $me
		);
		$this->db->insert('notes', $thing);
	}

	function updateNote($data, $noteid){
		//UPDATE `a19ux1`.`notes` SET `note`='All in all, you're just another brick in the wall' WHERE `noteID`='1';
		$this->db->set($data)->where('noteID', $noteid)->update('notes');
	}

	function hideNote($caid, $noteID){
			//$this->db->insert('notes_hidden', array('caregiverID'=>$caid, 'noteID'=>$noteID));
			$result = $this->db->select('authorID')->where('noteID', $noteID)->get('notes');
			if($result->row()->authorID == $caid){
				$this->db->delete('notes', array('noteID'=>$noteID));
			} else {
				$this->db->insert('notes_hidden', array('caregiverID'=>$caid, 'noteID'=>$noteID));
			}
	}

	function getAuthor($id) {
		$query = $this->db->get_where("caregiver", array("caregiverID"=>($id)));
		return $query;
	}
}
