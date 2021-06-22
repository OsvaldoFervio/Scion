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

    public function update($id, $data, $image)
    {
        $teamData = $this->buildTeamData($data);
        $teamData['id'] = $id;
        $this->model->save($teamData);

        $this->storeImage($id, $image);
    }

    public function getAll($userId = null) {
        if($userId) {
            $query = $this->model->distinct()->select('teams.*')
                ->where(['teams.user_id' => $userId])
                ->orWhere('team_members.user_id', $userId)
            ->join('team_members', 'team_members.team_id = teams.id')
            ->orderBy('teams.created_at', 'DESC');
            //log_message('error', 'Query: '. $query->getCompiledSelect());
            return $query->get()->getResult();
        }
        return $this->model->findAll();
    }

    public function getById($id) {
        return $this->model->find($id);
    }

    public function getTeamMembers($teamId){
        $query = $this->teamMemberModel->select('users.id, users.username, users.first_name, users.last_name, member_types.id as type')->where(['team_id' => $teamId])
        ->join('users', 'users.id = team_members.user_id')
        ->join('member_types', 'member_types.id = team_members.member_type_id');
        return $query->get()->getResult();
    }

    public function getTeamMembersByType($teamId){
        $results = $this->getTeamMembers($teamId);
        $manager = $results[0];
        $participants = array_filter($results, function($item) {
            return $item->type == 2;
        });
        return ['manager' => $manager, 'participants' => $participants];
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

    private function buildTeamData($data, $userId = null)
    {
        $array = [];
        if($userId)
            $array['user_id'] = $userId;
        $array['country_id'] = $data['country_id'];
        $array['name'] = $data['name'];
        $array['discord_url'] = $data['discord_url'];
        $array['whatsapp_number'] = $data['whatsapp_number'];
        $array['email'] = $data['email'];
        return $array;
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