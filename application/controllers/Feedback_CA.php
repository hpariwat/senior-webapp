<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_CA extends CI_Controller
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
		$this->load->model('feedback_model');
	}

	public function index()
	{
		$this->load->view('feedback_CA');
	}

	public function addQuestion()
	{
		$data = array(
			'question' => $this->input->post('question'),
			'topic' =>  $this->input->post('topic'),
		);
		$data = array_map(function($s){ return htmlspecialchars($s); }, $data);
		$data = $this->security->xss_clean($data);
		$this->feedback_model->AddQ($this->session->ca_id, $data['question'], $data['topic']);
		redirect('feedback_CA');
	}

	public function editQuestion()
	{
		$data = array(
			'topic' => $this->input->post('topic'),
			'nl' =>  $this->input->post('question'),
			'en' =>  $this->input->post('question')
		);
		$data = array_map(function($s){ return htmlspecialchars($s); }, $data);
		$data = $this->security->xss_clean($data);
		$this->feedback_model->updateQuestion($data, $this->input->post('questionID'));
		redirect('feedback_CA');
	}

	public function getQuestions()
	{
		$questions = $this->feedback_model->getQuestions();
		$questions = array_reverse($questions);
		echo json_encode($questions);
	}

	public function getAmount()
	{
		return $this->feedback_model->countQuestions();
	}

	public function deleteQuestion()
	{
		$this->feedback_model->deleteQ($this->input->post('questionID'), $this->session->ca_id);
	}
}
