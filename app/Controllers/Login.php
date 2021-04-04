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

	public function post() {
	    $data = [
	        'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

    }
}
