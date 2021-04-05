<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		//$user = new UserModel($db);
		//$datos = $user->find('1');
		//var_dump($datos);
		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('index');
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
		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('eventos');
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
}