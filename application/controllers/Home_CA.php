<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_CA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('ca_id')) redirect('landing');
		$this->load->model('CA_Home_model');
	}

	public $data = array();	// this will be an array of 3 arrays -> event[E0]['title'] is the title of the first event etc..

	public function index()
	{
		$this->getCalender();
		$this->getNotes();
		$this->load->view('home_CA', $this->data);
	}

	public function logout()
	{
		$data = $this->session->all_userdata();
		foreach($data as $row => $rows_value) $this->session->unset_userdata($row);
		redirect('landing');
	}

	public function addNote()
	{
		$task_name = $this->input->post('t_task_name');
		if ($task_name == null) return;
		$task_name = $this->security->xss_clean(htmlspecialchars($task_name));
		$author_id = $this->session->ca_id;
		$cg_selected = $this->input->post('t_cg') == 'on' ? 1 : 0;
		$et_selected = $this->input->post('t_et') == 'on' ? 1 : 0;
		$vt_selected = $this->input->post('t_vt') == 'on' ? 1 : 0;

		$this->CA_Home_model->addNote($author_id, null, $task_name, $cg_selected, $et_selected, $vt_selected, 0 );
		redirect("home_CA");
	}

	public function addpersonalnote() {
		$task_name = $this->input->post('tp_task_name');
		if ($task_name == null) return;
		$task_name = $this->security->xss_clean(htmlspecialchars($task_name));
		$author_id = $this->session->ca_id;
		$this->CA_Home_model->addNote($author_id, null, $task_name, 0, 0, 0, 1);
		redirect("home_CA");
	}

	public function deleteNote(){
		$this->CA_Home_model->hideNote($this->session->ca_id, $this->input->post('noteID'));
	}

	private function getNotes(){
		$result = $this->CA_Home_model->getnotes($this->session->ca_id, $this->session->ca_function);
		$private = array();
		$shared = array();

		foreach ($result->result() as $row){
			$authorInfo = $this->CA_Home_model->getAuthor($row->authorID);
			$author = $authorInfo->row();
			$name = $author->first_name . " " . $author->last_name;

			if($row->me == 1){	// note added to personal array
				if ($row->authorID != $_SESSION['ca_id']) continue;
				$arr = array(
					'note'=>$row->note,
					'date'=>$row->date,
					'noteID'=>$row->noteID,
					'author'=> $name
				);
				$private[] = $arr;
			} else {
				$cg = $row->caregiver;
				$et = $row->entertainer;
				$vt = $row->volunteer;

				$everyone = (($cg == 1 && $et == 1 && $vt == 1) ? 1 : 0);
				$arr = array(
					'note'=>$row->note,
					'date'=>$row->date,
					'noteID'=>$row->noteID,
					'author'=> $name,
					'sharewith'=> ($everyone == 1 ? "Everyone" : ($cg == 1 ? "Caregiver" : ($et == 1 ? "Entertainer" : ($vt == 1 ? "Volunteer" : "IDK"))))
				);
				$shared[] = $arr;
			}
		}
		$this->data['shared'] = array_reverse($shared);
		$this->data['private'] = array_reverse($private);
	}

	private function getCalender(){
		$result = $this->CA_Home_model->fetchactivities();
		$calender = array();
		for($i=0; $i<3; $i++){
			$row = $result->row($i);
			if(is_null($row)){		// no event to display -> no event data will be displayed
				$arr = array(
					'title'=>'No future events',
					'description'=> 'There are no future events to display',
					'start_date'=> 'nothing here either',
					'end_date'=> 'still nothing to see',
					'all_day' => '1');
				$calender[] = $arr;
			}else{
				$arr = array(
					'title'=> $row->title,
					'description'=> $row->description,
					'start_date'=> date("j M Y", strtotime($row->start_date)),
					'end_date'=> date("j M Y", strtotime($row->end_date))
				);
				if($row->all_day == 1){
					$arr['all_day'] = 1;
				}else{
					$arr['all_day'] = 0;
					$arr['start_time'] = date("g:i A", strtotime($row->start_time));
					$arr['end_time'] = date("g:i A", strtotime($row->end_time));
				}
				$calender[] = $arr;
			}
		}
		$this->data['activities'] = $calender;
	}
}
