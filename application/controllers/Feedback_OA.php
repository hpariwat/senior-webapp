<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_OA extends CI_Controller
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
		$this->load->model('feedback_model');
	}

	public function index(){
		$this->fetch();
		$this->load->view('feedback_OA', $this->getData());
	}

	private function fetch(){
		$result = $this->feedback_model-> fetchNext($this->session->oa_id);
		if(is_null($result)){ redirect('/completed');}
		$this->data['qid'] = $result->questionID;
		$this->data['question_nl'] = $result->nl;
		$this->data['question_en'] = $result->en;
		$this->data['topic'] = $result->topic;

		$this->session->set_userdata('feedback_id', $result->questionID);
	}

	public function submit()
	{
		$number=$_GET['score'];
		if ($this->session->feedback_id != 0) {
			$this->feedback_model->submit_answer($this->session->oa_id, $number , $this->session->feedback_id);
			$this->session->unset_userdata('feedback_id');
			redirect('/feedback_OA');
		}
	}
}
