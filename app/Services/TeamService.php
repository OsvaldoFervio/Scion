<?php

namespace App\Services;

use CodeIgniter\Exceptions\PageNotFoundException;

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
        // var_dump($teamData);
        // return;
        $this->model->save($teamData);

        $this->storeImage($id, $image);
        $managerId = $data['manager_id'];
        $participants = $data['user_id'];
        $this->updateTeamMembers($id, $managerId, $participants);
    }

    public function getAll($userId = null) {

        if($userId && $userId != 1) {
            $query = $this->model->distinct()->select('teams.*')
                ->where(['teams.user_id' => $userId])
                ->where('teams.deleted_at is NULL')
                ->orWhere('team_members.user_id', $userId)
            ->join('team_members', 'team_members.team_id = teams.id and teams.deleted_at is NULL', 'left')
            ->orderBy('teams.created_at', 'DESC');
            //log_message('error', 'Query: '. $query->getCompiledSelect());
            return $query->get()->getResult();
        }
        else if($userId== 1){
            $query = $this->model->distinct()->select('teams.*')                
                ->where('teams.deleted_at is NULL')               
            ->join('team_members', 'team_members.team_id = teams.id and teams.deleted_at is NULL', 'left')
            ->orderBy('teams.created_at', 'DESC');
        }
        return $this->model->findAll();
    }

    public function getById($id) {
        $result = $this->model->find($id);
        if(! $result)
            throw PageNotFoundException::forPageNotFound('Esta página no existe');
        return $result;
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->teamMemberModel->where('team_id', $id)->where('deleted_at is null')->delete();
    }

    public function getTeamMembers($teamId){
        $query = $this->teamMemberModel->select('users.id, users.username, users.first_name, users.last_name, member_types.id as type')
        ->where(['team_id' => $teamId])->where('team_members.deleted_at is NULL')
        ->join('users', 'users.id = team_members.user_id')
        ->join('member_types', 'member_types.id = team_members.member_type_id');
        return $query->get()->getResult();
    }

    public function getTeamMembersByType($teamId){
        $results = $this->getTeamMembers($teamId);
        $manager = null;
        $participants = [];
        if(count($results) > 0) {
            $manager = $results[0];
            $participants = array_filter($results, function($item) {
                return $item->type == 2;
            });
        }
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

    private function updateTeamMembers($teamId, $managerId, $participants)
    {
        $currentMembers = $this->teamMemberModel->where(['team_id' => $teamId])->findAll();
        $participantIds = array_merge(array($managerId), $participants);
        $this->updateCurrentMembers($currentMembers, $participantIds);
        $this->updateNewMembers($teamId, count($currentMembers), $participantIds);
        $this->deleteMembers($currentMembers, $participantIds);
    }

    private function updateCurrentMembers($currentMembers, $participantIds)
    {
        $result = $this->sliceUpdateMembers($currentMembers, $participantIds);
        $this->updateMembers($result['members'], $result['ids']);
    }

    private function updateMembers($members, $ids)
    {
        $membersData = $this->buildUpdateParticipantData($members, $ids);
        // echo $membersData;
        // var_dump($membersData);
        // return;

        $this->teamMemberModel->updateBatch($membersData, 'id');
    }

    private function sliceUpdateMembers($currentMembers, $participantIds)
    {
        $totalMembers = count($currentMembers);
        $totalParticipantIds = count($participantIds);
        $sliceLength = $totalMembers <= $totalParticipantIds ? $totalMembers : $totalParticipantIds;
        $members = array_slice($currentMembers, 0, $sliceLength);
        $ids = array_slice($participantIds, 0, $sliceLength);
        return ['members' => $members, 'ids' => $ids];
    }

    private function updateNewMembers($teamId, $totalMembers, $participantIds)
    {
        $newMembers = array_slice($participantIds, $totalMembers);
        if(! empty($newMembers)) {
            $newMembersData = $this->buildParticipantsData($teamId, $newMembers);
            $this->teamMemberModel->insertBatch($newMembersData);
        }
    }

    private function deleteMembers($currentMembers, $participantsIds)
    {
        $countDeleteMembers = count($participantsIds) - count($currentMembers);
        if($countDeleteMembers < 0){
            $members = array_slice($currentMembers, $countDeleteMembers);
            foreach($members as $member)
                $this->teamMemberModel->delete($member->id);
        }
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

    private function buildUpdateParticipantData($currenData, $newData)
    {
        return array_map(function($item, $index) use ($newData) {
            return [
                'id' => $item->id,
                'team_id' => $item->team_id,
                'user_id' => $newData[$index],
                'member_type_id' => $item->member_type_id
            ];
        }, $currenData, array_keys($newData));
    }
}