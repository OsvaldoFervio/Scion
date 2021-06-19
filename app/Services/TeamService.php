<?php

namespace App\Services;

class TeamService
{
    protected $model = null;
    protected $teamMemberModel = null;

    public function __construct()
    {
        $this->model = model('TeamModel');
        $this->teamMemberModel = model('TeamMemberModel');
    }

    public function create($data)
    {
        $teamData = $this->buildTeamData($data);
        $this->model->save($teamData);
        $teamId = $this->model->insertID;
        echo var_dump($teamId);

        $managerId = $data['manager_id'];
        $participants = $data['user_id']; // array
        $this->createMembers($teamId, $managerId, $participants);
    }

    private function createMembers($teamId, $managerId, $participants)
    {
        $managerData = [
            [
                'team_id' => $teamId,
                'user_id' => $managerId,
                'member_type_id' => 1
            ]
        ];
        $data = array_merge($managerData, $this->buildParticipantsData($teamId, $participants));
        $this->teamMemberModel->insertBatch($data);
    }

    private function buildTeamData($data)
    {
        return [
            'country_id' => $data['country_id'],
            'name' => $data['name'],
            'discord_url' => $data['discord_url'],
            'whatsapp_number' => $data['whatsapp_number'],
            'email' => $data['email']
        ];
    }

    private function buildParticipantsData($teamId, $participants)
    {
        return array_map(function($item) use ($teamId){
            return [
                'team_id' => $teamId,
                'user_id' => $item,
                'member_type_id' => 2
            ];
        }, $participants);
    }
}