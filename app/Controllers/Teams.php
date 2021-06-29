<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Config\Services;

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
        $teamMembers = $this->service->getTeamMembers($id);
        echo view('team', ['team' => $team, 'members' => $teamMembers]);
    }

    public function edit($id)
    {
        $team = $this->service->getById($id);
        $modelCountry = model('CountryModel');
		$countries = $modelCountry->findAll();
        $teamMembers = $this->service->getTeamMembersByType($id);
        echo view('team_form_update', [
            'team' => $team, 'countries' => $countries, 'members' => $teamMembers]);
    }

    public function new() {
        $modelCountry = model('CountryModel');
		$countries = $modelCountry->findAll();

		echo view('team_form', ['countries' => $countries]);
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

    public function update($id)
    {
        $data = $this->request->getPost();
        $validation = Services::validation();
        if($validation->run($data, 'team_update')) {
            $image = $this->request->getFile('images');
            $this->service->update($id, $data, $image);
            return redirect()->to(base_url('teams/'.$id))->with('success', 'Datos actualizados');
        }
        $errors = $validation->getErrors();
        return redirect()->back()->with('errors', $errors);
    }

    public function delete($id)
    {
        $this->service->delete($id);
        return redirect()->to(base_url('teams'))->with('success', 'Equipo eliminado');
    }
}