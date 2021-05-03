<?php


namespace App\Controllers;

class Events extends BaseController
{
    protected $service = null;

    public function __construct()
    {
        $this->service = service('event');
    }

    public function show($id) {

        $modelEvent = model('EventModel');
		$data['events'] = $modelEvent->where('id <', $id)->orderBy('created_at', 'desc')->paginate();

        $data['event'] = $this->service->getById($id);
        $data['eventDetails'] = $this->service->getDetailsByEventId($id);
        $data['eventAwards'] = $this->service->getAwardsByEventId($id);
        $data['eventStages'] = $this->service->getStagesByEventId($id);       

        echo view('eventos', $data);
    }
}