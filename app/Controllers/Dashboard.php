<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Controllers\BaseController;
use Config\Services;

class Dashboard extends BaseController
{
    protected $service = null;

    public function __construct()
    {
        $this->service = service('event');
        $this->serviceTeam = service('team');
        $this->serviceUser = service('user');

    }

    //TABLERO 1
    public function index()
    {
        $user = model('UserModel');
        $users = $user->findAll();
        $totals = $this->getTotals($user);
       
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/index', ['users' => $users, 'totals' => $totals]);
        echo view('Admin/footer');
    }

    //TABLERO 2
    public function eventos()
    {
        $event = model('EventModel');
        $events = $event->findAll();       
        $totals = $this->getEventTotals($event);

        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/eventos', ['events' => $events, 'totals' => $totals]);
        echo view('Admin/footer');
    }

    //TABLERO 3
    public function pagos()
    {
        $user = model('UserModel');
        $users = $user->findAll();
        $totals = $this->getTotals($user);

        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/pagos', ['users' => $users, 'totals' => $totals]);
        echo view('Admin/footer');
    }

    public function equipos()
    {
        $team = model('TeamModel');
        $teams = $team->findAll();

        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/equipos', ['teams' => $teams]);
        echo view('Admin/footer');
    }

    public function getTotals($user)
    {
        $data = array('total' => $user->CountAll(), 'active' => $user->where('active',1)->countAllResults(), 'block' => '');
        $data['block'] = $data['total'] - $data['active'];
        return $data;
    }

     public function getEventTotals($event)
    {
        $date = date('Y-m-d');
        var_dump($date);
        $data = array('total' =>   $event->where('deleted_at',null)->countAllResults(), 
                      'active' =>  $event->where('deleted_at',null)->where('active',1)->countAllResults(),
                      'block' =>   $event->where('active',0)->countAllResults(),
                      'expired' => $event->where('date <',$date)->countAllResults()
                  );
        return $data;
    }

    



    public function evento($id)
    {
        $modelEvent = model('EventModel');

        $data['events'] = $modelEvent->where('id <', $id)->orderBy('created_at', 'desc')->paginate();
        $data['event'] = $this->service->getById($id);
        $data['eventDetails'] = $this->service->getDetailsByEventId($id);
        $data['eventAwards'] = $this->service->getAwardsByEventId($id);
        $data['eventStages'] = $this->service->getStagesByEventId($id);

        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/evento', $data);
        echo view('Admin/footer');
    }

    //Country
    public function Country()
    {
    }

    public function createCountry()
    {
    }


    //Platform
    public function Platform()
    {
    }

    public function createPlatform()
    {
    }

    //Gaming
    public function Gaming()
    {
    }



    //Award
    public function Award()
    {
    }

    public function createAward()
    {
    }


    //Events
    public function Event()
    {
        //$vista = $this->template('auth/login, $data'); 
        $data = $this->getData();

        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/event_form', $data);
        echo view('Admin/footer');

        // echo view('Dashboard/index',array('data'=>$data ,'totales'=>$totales),TRUE);
    }

    public function createEvent()
    {
        $data = $this->request->getPost();
        //var_dump($data);
        //return;
        if ($this->validate('event')) {
            $eventId = $this->service->create($data);
            $this->service->storeEventImages($eventId, $this->request->getFiles());
            return redirect()->to(base_url('Dashboard/Event'))->with('success', 'Evento creado');
        } else {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
    }

    public function EditEvent($id)
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

        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/event_edit', $data);
        echo view('Admin/footer');
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        var_dump($data);
        return;
        $validation = Services::validation();
        if ($validation->run($data, 'event')) {
            $this->service->update($id, $data);
            $this->service->storeEventImages($id, $this->request->getFiles());
            return redirect()->to(base_url('Dashboard/eventos/'))->with('success', 'Evento actualizado');
        } else {
            return redirect()->back()->with('errors', $validation->getErrors());
        }
    }


    public function getTemplate($view)
    {
        /*$data = array(
            'head' => $this->load->view('layout/head','',TRUE), 
            'leftnav' => $this->load->view('layout/leftnav','',TRUE),
            'nav' => $this->load->view('layout/nav','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('layout/footer','',TRUE),
        );
        $this->load->view('dashboard',$data);*/
    }

    public function createGame()
    {
        $data = $this->request->getPost();
        //var_dump($data);
        //return;
        if ($this->validate('game')) {
            $eventId = $this->service->create($data);
            $this->service->storeEventImages($eventId, $this->request->getFiles());
            return redirect()->to(base_url('Dashboard/Event'))->with('success', 'Evento creado');
        } else {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
    }

    protected function getData()
    {
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

    public function Team()
    {
        $modelCountry = model('CountryModel');
        $countries = $modelCountry->findAll();

        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/team_form', ['countries' => $countries]);

        echo view('Admin/footer');
    }


    public function showTeam($id)
    {
        $team = $this->serviceTeam->getById($id);
        $teamMembers = $this->serviceTeam->getTeamMembers($id);
        $teamPendingUsers = $this->serviceTeam->getTeamPendingUsers($id);
        $teamMemberList = array_merge($teamMembers, $teamPendingUsers);

        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/team', ['team' => $team, 'members' => $teamMemberList]);

        echo view('Admin/footer');
    }

    public function activateUser($idUser)
    {
        $team = $this->serviceUser->activate($idUser);
        return redirect()->to(base_url('Dashboard/'))->with('success', 'Usuario activado');
    }

    public function blockUser($idUser)
    {
        $team = $this->serviceUser->block($idUser);
        return redirect()->to(base_url('Dashboard/'))->with('success', 'Usuario bloqueado');
    }

    public function editTeam($id)
    {
        $team = $this->serviceTeam->getById($id);
        $modelCountry = model('CountryModel');
        $countries = $modelCountry->findAll();
        $teamMembers = $this->serviceTeam->getTeamMembersByType($id);
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/team_form_update', ['team' => $team, 'countries' => $countries, 'members' => $teamMembers]);

        echo view('Admin/footer');
    }

    public function updateTeam($id)
    {
        $this->serv = service('team');

        $data = $this->request->getPost();
        $validation = Services::validation();
        if ($validation->run($data, 'team_update')) {
            $image = $this->request->getFile('images');
            $this->serv->update($id, $data, $image);
            return redirect()->to(base_url('Dashboard/showTeam/' . $id))->with('success', 'Datos actualizados');
        }
        $errors = $validation->getErrors();
        return redirect()->back()->with('errors', $errors);
    }

    public function deleteTeam($id)
    {
        $this->serviceTeam->delete($id);
        return redirect()->to(base_url('Dashboard/equipos'))->with('success', 'Equipo eliminado');
    }


}
