<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_OA extends CI_Controller
{
	private $data = array(
		'qid'=> 0,
		'question_nl',
		'question_en',
		'topic',
		'nr_topic',
		'total_topic'
	);

	public function getData(): array
	{
		return $this->data;
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('oa_id'))
		{
			redirect('landing');
		}
		$this->load->model('OA_question_model');
	}

	public function index(){
		$this->fetch();
		$this->load->view('question_OA', $this->getData());
	}

	private function fetch(){
		$result = $this->OA_question_model->fetch_next_inter($this->session->oa_id, $this->session->oa_last_question);
		if(is_null($result)){ redirect('/completed');}
		$this->data['qid'] = $result->questionID;
		$this->data['question_nl'] = $result->nl;
		$this->data['question_en'] = $result->en;
		$this->data['topic'] = $result->topic;
		$this->data['nr_topic'] = $result->nr_topic;
		$this->data['total_topic'] = $this->OA_question_model->getTopicNr($this->getData()['topic']);

		$this->session->set_userdata('current_qid', $result->questionID);
		$this->session->set_userdata('nr_topic', $result->nr_topic);
	}

	public function submit()
	{
		$number=$_GET['score'];
		if ($this->session->current_qid != 0) {
			$this->OA_question_model->submit_answer($this->session->oa_id, $number , $this->session->current_qid);
			$this->session->set_userdata('oa_last_question', $this->session->current_qid);
			$this->session->unset_userdata('current_qid');
			redirect('/question_OA');
			}
	}
}
