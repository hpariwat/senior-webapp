<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_Feedback_CA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('ca_id')) redirect('landing');
		$this->load->library('table');
		$this->load->model('CA_Feedback_model');
	}

	public function index()
	{
		$data = $this->CA_Feedback_model->get_all_feedback_questions();
		$template = array(
			'table_open'            => '<table id="myTable" class="table table-hover">', //table-striped table-bordered

			'thead_open'            => '<thead class="table-head">',
			'thead_close'           => '</thead>',

			'heading_row_start'     => '<tr>',
			'heading_row_end'       => '</tr>',
			'heading_cell_start'    => '<th>',
			'heading_cell_end'      => '</th>',

			'tbody_open'            => '<tbody>',
			'tbody_close'           => '</tbody>',

			'row_start'             => '<tr>',
			'row_end'               => '</tr>',
			'cell_start'            => '<td class="details-control">',
			'cell_end'              => '</td>',

			'row_alt_start'         => '<tr>',
			'row_alt_end'           => '</tr>',
			'cell_alt_start'        => '<td class="details-control">',
			'cell_alt_end'          => '</td>',

			'table_close'           => '</table>'
		);

		$this->table->set_template($template);
		$this->table->set_heading('Topic','Question','ID');

		$table_list['table'] = $this->table->generate($data);
		$this->load->view('statistics_feedback_ca', $table_list);
	}
	public function getData()
	{
		$qid=$this->input->post('qid');
		$data=$this->CA_Feedback_model->getbars($qid);
		echo json_encode($data);
	}
}
