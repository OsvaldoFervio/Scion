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
    
    public function index(){     
        // //$vista = $this->template('auth/login, $data'); 
        // $modelEvent = model('EventModel');
        // $events = $modelEvent->orderBy('created_at', 'desc')
        //                      ->paginate();

         $user = model('UserModel');  
         $users = $user->findAll();

         foreach ($users as $item) {
            echo $item->id ;
            echo $item->first_name;
            echo $item->last_name;
            echo $item->birthdate ;
            echo $item->username ;
            echo $item->email ;
            echo $item->active ;
         }
         // return;
         //var_dump($users);
         //return;
                             
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/index', ['users' => $users] );
        echo view('Admin/footer');

        // echo view('Dashboard/index',array('data'=>$data ,'totales'=>$totales),TRUE);
    }

    public function eventos(){     
        
        $event = model('EventModel');  
        $events = $event->findAll();

                             
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/eventos', ['events' => $events] );
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