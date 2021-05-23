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
    }
    
    //TABLERO 1
    public function index(){     
        
        $user = model('UserModel');  
        $users = $user->findAll();
        $totals = $this->getTotals($user);
        
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/index', ['users' => $users, 'totals' =>$totals] );
        echo view('Admin/footer');

    }

        //TABLERO 2
    public function eventos(){     
        
        $event = model('EventModel');  
        $events = $event->findAll();

                             
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/eventos', ['events' => $events] );
        echo view('Admin/footer');

    }

        //TABLERO 3
    public function pagos(){     
        
        $user = model('UserModel');  
        $users = $user->findAll();
        $totals = $this->getTotals($user);
                             
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/pagos', ['users' => $users, 'totals' =>$totals] );
        echo view('Admin/footer');

    }

    public function getTotals( $user )
    {
        
        $active = 3;

        $data = array('users' => $user->CountAll(),'active' =>$active, 'block' =>'' );  
        $data['block']=$data['users'] - $data['active'];
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


       // echo view('eventos', $data);

        // var_dump($data);
        // return;
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/evento', $data );
        echo view('Admin/footer');

    }

    //Country
    public function Country(){

    }

    public function createCountry(){

    }
    

    //Platform
    public function Platform(){

    }

    public function createPlatform(){

    }

    //Gaming
    public function Gaming(){

    }

    public function createGaming(){

    }

    //Award
    public function Award(){

    }

    public function createAward(){

    }


    //Events
    public function Event(){     
        //$vista = $this->template('auth/login, $data'); 
         $data = $this->getData();
        
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/event_form',$data);
        echo view('Admin/footer');

        // echo view('Dashboard/index',array('data'=>$data ,'totales'=>$totales),TRUE);
    }

    public function createEvent() {
        $data = $this->request->getPost();
        var_dump($data);
        //return;
        if($this->validate('event')) {
            $eventId = $this->service->create($data);
            $this->service->storeEventImages($eventId, $this->request->getFiles());
            return redirect()->to(base_url('Dashboard/Event'))->with('success', 'Evento creado');
        } else {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
    }

    public function EditEvent($id){     

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
        echo view('Admin/event_edit',$data);
        echo view('Admin/footer');



        // echo view('Dashboard/index',array('data'=>$data ,'totales'=>$totales),TRUE);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $validation = Services::validation();
        if($validation->run($data, 'event')) {
            $this->service->update($id, $data);
            $this->service->storeEventImages($id, $this->request->getFiles());
            return redirect()->to(base_url('Dashboard/eventos/'))->with('success', 'Evento actualizado');
        } else {
            return redirect()->back()->with('errors', $validation->getErrors());
        }
    }


    public function getTemplate($view){
        /*$data = array(
            'head' => $this->load->view('layout/head','',TRUE), 
            'leftnav' => $this->load->view('layout/leftnav','',TRUE),
            'nav' => $this->load->view('layout/nav','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('layout/footer','',TRUE),
        );
        $this->load->view('dashboard',$data);*/
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