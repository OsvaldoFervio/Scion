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

    public function new() {
        $data = $this->getData();
        echo view('event_form', $data);
    }

    public function create() {
        $data = $this->request->getRawInput();
        $eventService = service('event');
        $eventService->create($data);
        return redirect()->redirect('/events/new')->with('success', 'Evento creado');
    }

    public function edit($id)
    {
        $service = service('event');
        $data = $this->getData();
        $event = $service->getById($id);
        $eventDetails = $service->getDetailsByEventId($id);
        $eventAwards = $service->getAwardsByEventId($id);
        $eventStages = $service->getStagesByEventId($id);
        $eventPlatforms = $service->getPlatformsByEventId($id);
        $data['event'] = $event;
        $data['eventDetails'] = $eventDetails;
        $data['eventAwards'] = $eventAwards;
        $data['eventStages'] = $eventStages;
        $data['platforms'] = $eventPlatforms;
        echo view('event_form_update', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->service->update($id, $data);
        return redirect()->redirect('/events/edit/'.$id)->with('success', 'Evento actualizado');
    }

    protected function getData() {
        $modelEventType = model('EventTypeModel');
        $modelCategory = model('CategoryModel');
        $modelDifficulty = model('DifficultyModel');
        $modelPlatform = model('PlatformModel');
        $modelVideogame = model('VideogameModel');
        $modelCountry = model('CountryModel');
        $modelTimezone = model('TimeZoneModel');
        $modelCurrency = model('CurrencyModel');


        $eventTypes = $modelEventType->findAll();
        $countries = $modelCountry->findAll();
        $categories = $modelCategory->findAll();
        $difficulties = $modelDifficulty->findAll();
        $videogames = $modelVideogame->findAll();
        $platforms = $modelPlatform->findAll();
        $timezones = $modelTimezone->findAll();
        $currencies = $modelCurrency->findAll();

        $data = [
            'eventTypes' => $eventTypes,
            'countries' => $countries,
            'categories' => $categories,
            'difficulties' => $difficulties,
            'videogames' => $videogames,
            'platforms' => $platforms,
            'timezones' => $timezones,
            'currencies' => $currencies,
        ];

        return $data;
    }
}