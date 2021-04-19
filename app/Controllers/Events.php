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
        $event = $this->service->getById($id);
        $eventDetails = $this->service->getDetailsByEventId($id);
        $eventAwards = $this->service->getAwardsByEventId($id);
        $eventStages = $this->service->getStagesByEventId($id);
        $data = [
            'event' => $event,
            'eventDetails' => $eventDetails,
            'eventAwards' => $eventAwards,
            'eventStages' => $eventStages
        ];
        echo view('eventos', $data);
    }
}