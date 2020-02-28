<?php


class CA_Statistics_model extends CI_Model
{
	function response_rate($month, $year){
		//SELECT distinct respondent FROM a19ux1.answer_interrai where date >= '2019-12-1' and date < '2020-1-1';
		$this->db->select('respondent')->distinct()->from('answer_interrai')->where('date >=', ($year."-".$month."-1"))->where('date <', ($year."-".($month +1)."-1") );
		return $this->db->count_all_results();
	}

	function year_stats($year){
		$yearstats = array();
		for($i = 1; $i<13; $i++){
			$arr = array();
			$arr['response'] = $this->response_rate($i, $year);
			$arr['avg_score'] = $this->total_avg_score($i, $year);
			$yearstats[] = $arr;
		}
		return $yearstats;
	}

	function total_avg_score($month, $year){
		//SELECT avg(score), question FROM a19ux1.answer_interrai where date >= '2019-12-1' and date < '2020-1-1' group by question;
		$subquery = '(' . $this->db->select_avg('score', 'score')->select('question')->where('date >=', ($year."-".$month."-1"))->where('date <', ($year."-".($month +1)."-1") )->group_by('question')->get_compiled_select('answer_interrai') . ') as rommel';
		//SELECT avg(score) FROM (SELECT avg(score) as score, question FROM a19ux1.answer_interrai where date >= '2019-12-1' and date < '2019-13-1' group by question) as table1;
		$query = $this->db->select_avg('score', 'score')->from($subquery)->get();
		return $query->row()->score;
	}

	function cat_score($month, $year){
	//SELECT avg(score) as score, topic from ((select ding.score, ding.question, a19ux1.question.topic from (((SELECT avg(score) as score, question FROM a19ux1.answer_interrai where date > '2019-12-1' and date < '2019-13-1' group by question) as ding) join a19ux1.question on ding.question =a19ux1.question.questionID)) as I) group by topic;
		$part1 = '((' . $this->db->select_avg('score', 'score')->select('question')->where('date >=', ($year."-".$month."-1"))->where('date <', ($year."-".($month +1)."-1") )->group_by('question')->get_compiled_select('answer_interrai') . ') as ding)';
		$part2 = '((' . $this->db->select('ding.score, ding.question, question.topic')->from($part1)->join('question', 'question.questionID = ding.question')->get_compiled_select(). ') as I)';
		$query = $this->db->select_avg('score', 'score')->select('topic')->from($part2)->group_by('topic')->order_by('score', "DESC")->get();
		return $query->result_array();
	}
}
