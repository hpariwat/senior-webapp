<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_CA extends CI_Controller
{
	public $data = array();

	public function getData(): array
	{
		return $this->data;
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('ca_id'))
		{
			redirect('landing');
		}
		$this->load->model('CA_Statistics_model');
	}

	public function index()
	{
		$this->load->view('statistics_CA', $this->getData());
	}

	private function makeData()
	{
		$this->data['yearstats'] = $this->CA_Statistics_model->year_stats(date('Y'));
	}
	public function getYearStats()
	{
		echo json_encode($this->CA_Statistics_model->year_stats($this->input->post('year')));
	}
	public function getCatStats()
	{
		echo json_encode($this->CA_Statistics_model->cat_score($this->input->post('month'),$this->input->post('year')));
	}

}
