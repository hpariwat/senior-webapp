<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'ChromePhp.php';
class Residents_CA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('ca_id'))
		{
			redirect('landing');
		}
		$this->load->model('CA_Residents_model');
		$this->load->library('table');
	}

	public function index()
	{
		$data = $this->CA_Residents_model->get_all_residents();
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
		if ($this->session->lang == 'nl') $this->table->set_heading('Kamer', 'Voornaam', 'Achternaam', 'Verjaardag');
		else $this->table->set_heading('Room', 'First Name', 'Last Name', 'Birthdate');

		$table_list['table'] = $this->table->generate($data);
		$this->load->view('residents_CA', $table_list);
	}

	public function validation()
	{
		$language = $this->input->post('r_language');
		if ($language == 'Nederlands') $language = 'nl';
		else if ($language == 'Français') $language = 'fr';
		else if ($language == 'English') $language = 'en';

		$year = $this->input->post('r_year');
		$month = $this->input->post('r_month');
		$day = $this->input->post('r_day');
		$birthdate = date("Y-m-d", strtotime($year . "-" . $month . "-" . $day));

		$data = array(
			'first_name' => $this->input->post('r_first_name'),
			'last_name' => $this->input->post('r_last_name'),
			'language' => $language,
			'room_number' => $this->input->post('r_room_number'),
			'birthdate' => $birthdate,
			'pincode' => $this->input->post('r_pin'),
			'active' => 1,
		);
		$data = array_map(function($s){ return htmlspecialchars($s); }, $data);
		$data = $this->security->xss_clean($data);

		if($this->CA_Residents_model->insert($data))
		{
			$this->session->set_flashdata('message', 'A new resident added!');
			redirect('residents_CA');
		}
		else
		{
			$this->session->set_flashdata('message', 'This room is already in use');
			$this->index();
		}
	}
}
