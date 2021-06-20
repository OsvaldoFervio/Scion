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

    public function create($data, $image)
    {
        $userId = session()->get('user_id');
        $teamData = $this->buildTeamData($data, $userId);
        $this->model->save($teamData);
        $teamId = $this->model->insertID;
        $this->storeImage($teamId, $image);

        $managerId = $data['manager_id'];
        $participants = $data['user_id']; // array
        $this->createMembers($teamId, $managerId, $participants);
    }

    public function getAll($userId = null) {
        if($userId)
            return $this->model->where(['user_id' => $userId])->findAll();
        return $this->model->findAll();
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

    private function storeImage($id, $image) {
        helper('storage');
        $folder = 'teams/'.$id;
        if($image->isValid()) {
            $image_path = store_image($image, $folder);
            $this->model->save(['id' => $id, 'image_url' => base_url($image_path)]);
        }
    }

    private function buildTeamData($data, $userId)
    {
        return [
            'user_id' => $userId,
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