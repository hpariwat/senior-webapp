<?php


class OA_question_model extends CI_Model
{
	function fetch_next_inter($id, $last_question){
		$maxq = $this->getNrOfQuestions();
		if($last_question == $maxq){	// all questions filled in
			return null;
		}
		if($last_question > 0){
			$query = $this->db->get_where("question", array("questionID"=>($last_question+1)));
			$row = $query->row();
			return $row;
		} else {
			$query = $this->db->select_max('date', "date")->select_max('question', 'question')->from("answer_interrai")->where("respondent", $id)->where('date >=', date("Y-n-1"))->get();
			//select max(question), max(date) from a19ux1.answer_interrai where respondent = 1 <- query like this to check for last answer
			$row = $query->row();
			if(is_null($row)){
				$query = $this->db->get_where("question", array("questionID"=>1));
				$row = $query->row();
				return $row;
			} else {
				if($row->question == $maxq){	// all questions filled in
					return null;
				}
				$query = $this->db->get_where("question", array("questionID"=>(1 + $row->question)));
				$row = $query->row();
				return $row;
			}
		}
	}

	function getTopicNr($topic){	//SELECT count(topic) FROM a19ux1.question where topic = "Veiligheid";
		$this->db->select("questionID")->from("question")->where("topic", $topic);
		return $this->db->count_all_results();
	}

	function getNrOfQuestions(){	//SELECT count(questionID) FROM a19ux1.question where posterID is null;
		$this->db->select("questionID")->from("question")->where("posterID");
		return $this->db->count_all_results();
	}

	function submit_answer($id, $score, $question){
		$thing = array(
					'question' => $question,
					'score' => $score,
					'respondent' => $id,
					'date' => date('Y-n-j')	//eg 2019-11-10
					);
		$this->db->insert('answer_interrai', $thing);
	}



}
