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
        $data = $this->request->getPost();
        $eventId = $this->service->create($data);
        $this->service->storeEventImages($eventId, $this->request->getFiles());
        return redirect()->redirect('/events/new')->with('success', 'Evento creado');
    }

    public function edit($id)
    {
        $data = $this->getData();
        $event = $this->service->getById($id);
        $eventDetails = $this->service->getDetailsByEventId($id);
        $eventAwards = $this->service->getAwardsByEventId($id);
        $eventStages = $this->service->getStagesByEventId($id);
        $eventPlatforms = $this->service->getPlatformsByEventId($id);
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
        $this->service->storeEventImages($id, $this->request->getFiles());
        return redirect()->redirect('/events/edit/'.$id)->with('success', 'Evento actualizado');
    }

    public function delete($id)
    {
        $this->service->delete($id);
        return redirect()->redirect('/Home/eventos')->with('success', 'Evento eleminado');
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