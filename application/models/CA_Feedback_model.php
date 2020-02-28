 <?php


class CA_Feedback_model extends CI_Model
{
	public function getresult($qid){
		$query = $this->db->select_avg('score', 'score')->select('question')->where('question', $qid)->get('answer_feedback');
		return $query->row();
	}

	public function getbars($qid){
		//SELECT count(score), score FROM a19ux1.answer_feedback where question = 56 group by score;
		$query = $this->db->select('count(score) as count')->select('score')->where('question', $qid)->group_by('score')->get('answer_feedback');
		return $query->result_array();
	}

	function get_all_questions()
	{
		$this->db->select('topic, nl, questionID');
		$this->db->order_by('topic');
		return $this->db->get('question')->result_array(); // query table
	}

	function get_all_feedback_questions()
	{
		$this->db->select('topic, nl, questionID');
		$this->db->where('nr_topic', null);
		$this->db->order_by('topic');
		return $this->db->get('question')->result_array(); // query table
	}


}
