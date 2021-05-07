<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $service = null;
    
    public function index(){     
        //$vista = $this->template('auth/login, $data'); 
        
        echo view('Admin/head');
        echo view('Admin/index');
        echo view('Admin/footer');

        // echo view('Dashboard/index',array('data'=>$data ,'totales'=>$totales),TRUE);
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
}