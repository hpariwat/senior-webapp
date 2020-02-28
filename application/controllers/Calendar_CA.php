<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_CA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('ca_id')) redirect('landing');
		$this->load->model('calendar_model');
		$this->load->model('CA_Residents_model');
		($this->session->lang == 'en') ? $this_lang = 'english' : $this_lang = 'dutch';
		$this->lang->load('ca_calendar', $this_lang);
	}

	public function index()
	{
		$this->load->view('calendar_CA');
	}

	public function load()
	{
		$events = $this->calendar_model->get_events();
		foreach($events as $event)
		{
			$start_time = $event['start_date'];
			$end_time = $event['end_date'];
			$data[] = array(
				'eventID' => $event['eventID'],
				'title' => $event['title'],
				'start' => ($event['all_day'] == FALSE) ? $start_time = $start_time . " " . $event['start_time'] : $start_time,
				'end' => ($event['all_day'] == FALSE) ? $end_time = $end_time . " " . $event['end_time'] : $end_time,
				'description' => $event['description'],
				'allDay' => $event['all_day'],
				'is_repeating' => $event['is_repeating'],
				'attendants' => $this->calendar_model->get_attendants_count($event['eventID']),
				'group_ID' => $event['group_ID']
			);
		}
		if (isset($data)) echo json_encode($data);
	}

	public function insert()
	{
		$start_date = strtotime($this->input->post('start_date'));
		$end_date = strtotime($this->input->post('end_date'));
		$group_id = $this->calendar_model->get_id(); // TODO: get ID after you insert

		if($this->input->post('is_repeating') == FALSE) // no repeat
		{
			$this->insert_event($start_date, $end_date, $group_id);
		}
		else // repeat
		{
			$max_date = strtotime("+52 weeks", $start_date); // no events after ... weeks (for too high repeat_end_date)
			$repeat_days = $this->input->post('repeat_on');
			if ($this->input->post('repeat_mode') == "endon") $end_repeat_date = strtotime($this->input->post('repeat_end_date')); // repeat till end date
			else $end_repeat_date = $max_date;

			if (count($repeat_days) > 1) // repeat on specific days
			{
				foreach($repeat_days as $day)
				{
					$start_date = strtotime("next " . $day);
					$end_date = strtotime("next " . $day);
					$this->insert_repeating_events($start_date, $end_date, $end_repeat_date, $max_date, $group_id);
				}
			}
			else // repeat every ...
			{
				$this->insert_repeating_events($start_date, $end_date, $end_repeat_date, $max_date, $group_id);
			}
		}
	}

	public function update()
	{
		$event = array(
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time'),
			'all_day' => $this->input->post('all_day'),
		);
		$this->calendar_model->update_event($event, $this->input->post('eventID'));
	}

	public function delete()
	{
		$this->calendar_model->delete_event($this->input->post('eventID'));
	}

	public function delete_repeat()
	{
		$this->calendar_model->delete_repeating_event($this->input->post('group_ID'));
	}

	public function show_participants()
	{
		$current_event_id = $this->input->post('eventID');
		$event_data = $this->calendar_model->show_participants($current_event_id);
		foreach($event_data as $row)
		{
			$older_adult = $this->CA_Residents_model->get_resident_info($row['olderAdultID']);
			foreach($older_adult as $item)
			{
				$data = array(
					'first_name' => $item['first_name'],
					'last_name' => $item['last_name'],
				);
				echo json_encode($data);
			}
		}
	}

	public function edit_event()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'description' =>  $this->input->post('description'),
		);
		$data = array_map(function($s){ return htmlspecialchars($s); }, $data);
		$data = $this->security->xss_clean($data);
		$this->calendar_model->update_event($data, $this->input->post('eventID'));
		redirect('calendar_CA');
	}

	private function insert_repeating_events($start_date, $end_date, $end_repeat_date, $max_date, $group_id)
	{
		if ($this->input->post('repeat_mode') == "endafter") // end after this occurrence
		{
			for ($i = 1; $i <= $this->input->post('repeat_occurrence'); $i++)
			{
				$this->insert_event($start_date, $end_date, $group_id);
				$start_date = strtotime("+" . $this->input->post('repeat_interval') . " " . $this->input->post('repeat_type'), $start_date);
				$end_date = strtotime("+" . $this->input->post('repeat_interval') . " " . $this->input->post('repeat_type'), $end_date);
			}
		}
		else
		{
			while ($start_date <= $end_repeat_date) // never end or end on this date
			{
				$this->insert_event($start_date, $end_date, $group_id);
				$start_date = strtotime("+" . $this->input->post('repeat_interval') . " " . $this->input->post('repeat_type'), $start_date);
				$end_date = strtotime("+" . $this->input->post('repeat_interval') . " " . $this->input->post('repeat_type'), $end_date);
				if ($start_date > $max_date) break; // db overloading protection
			}
		}
	}

	private function insert_event($start_date, $end_date, $group_ID)
	{
		$data = array(
			'title' => $this->input->post('title') ? $this->input->post('title') : $this->lang->line('Title_placeholder'),
			'description' => $this->input->post('description') ? $this->input->post('description') : $this->lang->line('Description_placeholder'),
			'start_date' => date("Y-m-d", $start_date),
			'end_date' => date("Y-m-d", $end_date),
			'start_time' => $this->input->post('all_day') == TRUE ? NULL : $this->input->post('start_time'),
			'end_time' => $this->input->post('all_day') == TRUE ? NULL : $this->input->post('end_time'),
			'all_day' => $this->input->post('all_day'),
			'is_repeating' => $this->input->post('is_repeating'),
			'group_ID' => $group_ID
		);
		$data = array_map(function($s){ return htmlspecialchars($s); }, $data);
		$data = $this->security->xss_clean($data);
		$this->calendar_model->insert_event($data); // insert data into event table
	}
}
