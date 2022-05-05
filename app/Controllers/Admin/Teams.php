<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

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
            $this->service->create($data, $image);
            return redirect()->to(base_url('Dashboard/equipos'))->with('success', 'Nuevo equipo creado');
        }
        $errors = $this->validator->getErrors();
        return redirect()->back()->with('errors', $errors);
	}
}
