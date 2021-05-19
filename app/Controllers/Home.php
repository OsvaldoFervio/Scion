<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{	
		$modelEvent = model('EventModel');
		$events = $modelEvent->orderBy('created_at', 'desc')
                             ->paginate();
		echo view('include_files/header');
		echo view('include_files/navbar');	
		echo view('index', ['events' => $events, 'pager' => $modelEvent->pager]);
		echo view('include_files/footer');
	}

	public function nosotros()
	{
		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('nosotros');
		echo view('include_files/footer');
	}

	public function planes()
	{
		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('planes');
		echo view('include_files/footer');
	}

	public function eventos()
	{
		$modelEvent = model('EventModel');
		$events = $modelEvent->orderBy('created_at', 'desc')
                             ->paginate();

	    echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('event_list', ['events' => $events, 'pager' => $modelEvent->pager]);
		echo view('include_files/footer');
	}

	public function equipos()
	{
		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('equipos');
		echo view('include_files/footer');
	}

	public function tabposicion()
	{
		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('tabposicion');
		echo view('include_files/footer');
	}

	public function dashboard()
	{
		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('Admin/index');
		echo view('include_files/footer');
	}
}
