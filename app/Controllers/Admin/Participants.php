<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Services;

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

    public function update($teamId) {
        $payload = $this->request->getPost();
        $participants = $payload['participants'];
        $added = array_key_exists('added', $participants) ? $participants['added'] : null;
        $ghosts = null;
        if($added) {
            $ghosts = array_key_exists('ghostusers', $added) ? $added['ghostusers'] : null;
        }
        $validator = Services::validation();
        $validator->setRuleGroup('team_participants');
        if($ghosts) {
            foreach($ghosts as $user) {
                if(! $validator->run($user)) {
                    $errors = $validator->getErrors();
                    return redirect()->to(base_url('Dashboard/editTeam/'.$teamId))->with('errors', $errors);
                }
            }
        }
        $this->service->updateTeamMembers1($teamId, $payload);
        return redirect()->to(base_url('Dashboard/editTeam/'.$teamId))->with('success', 'Miembros de equipo actualizados');
    }
}