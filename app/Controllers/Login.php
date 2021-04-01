<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends BaseController
{
	public function index()
	{
		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('login');
		echo view('include_files/footer');
	}

    public function registro()
    {	
		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('registro');	
		echo view('include_files/footer');
	}
}
