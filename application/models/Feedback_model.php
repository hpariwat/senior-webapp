<?php


class Feedback_model extends CI_Model
{
	public function fetchNext($oaid){
		//SELECT max(question) FROM a19ux1.answer_feedback where and respondent = 1;
		$query = $this->db->select_max("question", "question")->from("answer_feedback")->where("respondent", $oaid)->get();
		$row = $query->row();
		if(is_null($row->question)){
			//SELECT * FROM a19ux1.question where posterID is not null order by questionID limit 1 ;
			$query = $this->db->select()->from("question")->where("posterID is NOT NULL", NULL)->order_by("questionID", 'ASC')->limit(1)->get();
			return $query->row();
		}else{
			$query = $this->db->select()->from("question")->where("questionID >", $row->question)->order_by("questionID", 'ASC')->limit(1)->get();
			return $query->row();
		}
	}

	function submit_answer($id, $score, $question){
		$thing = array(
			'question' => $question,
			'score' => $score,
			'respondent' => $id,
		);
		$this->db->insert('answer_feedback', $thing);
	}

	public function AddQ($CA_ID, $question, $topic){
		$thing = array(
			'posterID' => $CA_ID,
			'nl' => $question,
			'en' => $question,
			'topic' => $topic
		);
		$this->db->insert('question', $thing);
	}

	public function updateQuestion($data, $id)
	{
		$this->db->where('questionID', $id);
		$this->db->update('question', $data);
	}

	public function deleteQ($qid, $CA_ID)
	{
		$this->db->delete('question', array('questionID' => $qid));
	}

	public function getQuestions(){
		return $this->db->get_where('question', array('posterID is not NULL' => null))->result_array();
	}

	public function countQuestions(){
		return $this->db->select()->where('posterID is not NULL')->count_all_results('question');
	}
}
