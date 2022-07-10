<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Participants extends BaseController
{

    protected $service = null;

	public function __construct()
	{
		$this->service = service('team');
	}

    public function join($teamId)
    {
        $payload = $this->request->getPost();
        $this->service->createMembers1($teamId, $payload);
        return redirect()->to(base_url('Dashboard/equipos'))->with('success', 'Miembros de equipo agregados');
    }
}