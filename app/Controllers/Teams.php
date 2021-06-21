<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Teams extends BaseController
{
    protected $service = null;

    public function __construct()
    {
        $this->service = service('team');
    }

    public function index() {
        $userId = session()->get('user_id');
        $teams = $this->service->getAll($userId);
        echo view('include_files/header');
        echo view('include_files/navbar');
        echo view('team_list', ['teams' => $teams]);
    }

    public function show($id) {
        $team = $this->service->getById($id);
        echo view('team', ['team' => $team]);
    }

    public function new() {
        $modelCountry = model('CountryModel');
		$countries = $modelCountry->findAll();

		echo view('include_files/header');
		echo view('include_files/navbar');
		echo view('equipos', ['countries' => $countries]);
		echo view('include_files/footer');
    }

    public function create()
    {
        if($this->validate('team')) {
            $data = $this->request->getPost();
            $image = $this->request->getFile('images');
            //echo json_encode($data);
            $this->service->create($data, $image);
            return redirect()->to(base_url('teams'))->with('success', 'Nuevo equipo creado');
        }
        $errors = $this->validator->getErrors();
        return redirect()->back()->with('errors', $errors);
    }
}