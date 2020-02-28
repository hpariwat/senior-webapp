<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_OA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('oa_id')) redirect('landing');
		$this->load->model('calendar_model');
	}

	public function index()
	{
		$this->load->view('calendar_OA');
	}

	public function join()
	{
		$data = array(
			'olderAdultID' => $this->input->post('olderAdultID'),
			'eventID' => $this->input->post('eventID')
		);
		$this->calendar_model->join_event($data);
	}

	public function dejoin()
	{
		$this->calendar_model->unjoin_event($this->input->post('eventID'), $this->input->post('olderAdultID'));
	}

	public function load()
	{
		$events = $this->calendar_model->get_events();
		$subscribed_events = $this->calendar_model->show_events_for_resident($_SESSION['oa_id']);
		foreach($events as $event)
		{
			$is_subscribed = 0;
			foreach($subscribed_events as $ev)
			{
				if ($ev['eventID'] == $event['eventID']) $is_subscribed = 1;
			}

			$className = '';
			if ($is_subscribed) $className = 'fc-subscribed';

			$data[] = array(
				'eventID' => $event['eventID'],
				'title' => $event['title'],
				'start' => ($event['all_day'] == FALSE) ? $event['start_date'] . " " . $event['start_time'] : $event['start_date'],
				'end' => ($event['all_day'] == FALSE) ? $event['end_date'] . " " . $event['end_time'] : $event['end_date'],
				'description' => $event['description'],
				'allDay' => $event['all_day'],
				'is_repeating' => $event['is_repeating'],
				'group_ID' => $event['group_ID'],
				'is_subscribed' => $is_subscribed,
				'className' => $className,
			);
		}
		if (isset($data)) echo json_encode($data); // send $data in JSON format
	}
}
