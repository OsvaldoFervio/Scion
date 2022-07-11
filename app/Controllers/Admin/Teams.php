<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Services;

class Teams extends BaseController
{
	protected $service = null;

	public function __construct()
	{
		$this->service = service('team');
	}

	public function index()
	{
		//
	}

	public function create() {
		if($this->validate('team')) {
            $data = $this->request->getPost();
            $image = $this->request->getFile('images');
            $teamId = $this->service->create($data, $image);
            return redirect()->to(base_url('Dashboard/TeamParticipants/'.$teamId))->with('success', 'Nuevo equipo creado');
        }
        $errors = $this->validator->getErrors();
        return redirect()->to(base_url('Dashboard/Team'))->with('errors', $errors);
	}

	public function update($id) {
        $data = $this->request->getPost();
        $validation = Services::validation();
        if ($validation->run($data, 'team_update')) {
            $image = $this->request->getFile('images');
            $this->service->update1($id, $data, $image);
            return redirect()->to(base_url('Dashboard/showTeam/' . $id))->with('success', 'Datos actualizados');
        }
        $errors = $validation->getErrors();
        return redirect()->to(base_url('Dashboard/editTeam/'.$id))->with('errors', $errors);
	}
}
