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
        log_message('error', 'TEAM_DATA: '.json_encode($teamData));
        $this->createManager($teamId, $managerId);
        return $teamId;
        /*$participants = $data['user_id']; // array
        $pendingUsernames = [];
        $userGameIds = $data['game_user_id'];
        if(array_key_exists('pending_username', $data))
            $pendingUsernames = $data['pending_username'];*/
        //$this->createMembers($teamId, $managerId, $participants, $pendingUsernames, $userGameIds);
    }

    private function createManager($teamId, $managerId) {
        $managerData = [
                'team_id' => $teamId,
                'user_id' => $managerId,
                'member_type_id' => 1,
                'game_user_id' => null,
        ];
        $this->teamMemberModel->save($managerData);
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

    public function update1($id, $data, $image) {
        $teamData = $this->buildTeamData($data);
        $teamData['id'] = $id;

        $this->model->save($teamData);
        $this->storeImage($id, $image);

        $managerId = $data['manager_id'];
        $this->updateTeamManagerMember($id, $managerId);
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
        $query = $this->teamMemberModel->select('team_members.id as team_member_id, users.id, users.username, users.first_name, users.last_name, member_types.id as type, team_members.game_user_id')
        ->where(['team_id' => $teamId])->where('team_members.deleted_at is NULL')
        ->join('users', 'users.id = team_members.user_id')
        ->join('member_types', 'member_types.id = team_members.member_type_id');
        return $query->get()->getResult();
    }

    public function getTeamPendingUsers($teamId) {
        $pendingUserModel = model('PendingUserModel');
        return $pendingUserModel->where('team_id', $teamId)->findAll();
    }

    public function getTeamMembersByType($teamId){
        $results = $this->getTeamMembers($teamId);
        $pendingUsers = $this->getTeamPendingUsers($teamId);
        $manager = null;
        $participants = [];
        if(count($results) > 0) {
            $manager = $results[0];
            $participants = array_filter($results, function($item) {
                return $item->type == 2;
            });
        }
        $participants = array_merge($participants, $pendingUsers);
        return ['manager' => $manager, 'participants' => $participants];
    }

    private function createMembers($teamId, $managerId, $participants, $pendingUsernames, $userGameIds)
    {
        $managerData = [
            [
                'team_id' => $teamId,
                'user_id' => $managerId,
                'member_type_id' => 1,
                'game_user_id' => null,
            ]
        ];
        $participantMembers = array_values(array_filter($participants, function($item) { return $item != -1; }));
        $participantsData = $this->buildParticipantsData($teamId, $participantMembers);
        $usersCount = count($participantsData);
        if($usersCount > 0) {
            $sliceGameUserIds = array_slice($userGameIds, 0, $usersCount);
            $data = $this->addUserGameId($participantsData, $sliceGameUserIds);
            $data = array_merge($managerData, $data);
        }
        else
            $data = array_merge($managerData, $participantsData);
        log_message('error', json_encode($data));
        $this->teamMemberModel->insertBatch($data);
        if(count($pendingUsernames) > 0) {
            $userGameIdPending = array_slice($userGameIds, $usersCount);
            $dataPendingUsers = $this->buildGhostUsersData($teamId, $pendingUsernames);
            $dataPendingUsers = $this->addUserGameId($dataPendingUsers, $userGameIdPending);
            $pendingUsersModel = model('PendingUserModel');
            $pendingUsersModel->insertBatch($dataPendingUsers);
        }
    }

    public function createMembers1($teamId, $members) {
        $users = array_key_exists('users', $members)
                ? $members['users']
                : [];
        $pendingUsers = array_key_exists('pending_users', $members)
                        ? $members['pending_users']
                        : [];
        $usersData = $this->buildParticipantsData2($teamId, $users);
        $ghostUsersData = $this->buildGhostUsersData($teamId, $pendingUsers);
        if(count($usersData) > 0)
            $this->teamMemberModel->insertBatch($usersData);
        if(count($ghostUsersData) > 0) {
            $pendingUsersModel = model('PendingUserModel');
            $pendingUsersModel->insertBatch($ghostUsersData);
        }
    }

    private function updateTeamMembers($teamId, $managerId, $participants)
    {
        $currentMembers = $this->teamMemberModel->where(['team_id' => $teamId])->findAll();
        $participantIds = array_merge(array($managerId), $participants);
        $this->updateCurrentMembers($currentMembers, $participantIds);
        $this->updateNewMembers($teamId, count($currentMembers), $participantIds);
        $this->deleteMembers($currentMembers, $participantIds);
    }

    public function updateTeamMembers1($teamId, $data) {
        $participants = array_key_exists('participants', $data) ?
            $data['participants'] : null;
        $added = array_key_exists('added', $participants) ?
            $participants['added'] : null;
        $ghosts = null;
        $users = null;
        if(!is_null($added)) {
            $ghosts = array_key_exists('ghostusers', $added) ?
                $added['ghostusers'] : null;
            $users = array_key_exists('users', $added) ?
                $added['users'] : null;
        }
        $removed = array_key_exists('removed', $participants) ?
            $participants['removed'] : null;
        // New ghost users saved
        if($ghosts) {
            $ghostData = $this->buildGhostUsersData($teamId, $ghosts);
            $pendingUsersModel = model('PendingUserModel');
            $pendingUsersModel->insertBatch($ghostData);
        }
        // New register users saved
        if($users) {
            $usersData = $this->buildParticipantsData2($teamId, $users);
            $this->teamMemberModel->insertBatch($usersData);
        }
        // Remove actual team members by id
        if($removed) {
            $this->deleteTeamMembers($removed);
        }
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
        if(array_key_exists('game_number_id',$data))
            $array['game_number_id'] = $data['game_number_id'];
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
                'member_type_id' => $item->member_type_id,
            ];
        }, $currenData, array_keys($newData));
    }

    private function buildGhostUsersData($teamId, $pending_usernames)
    {
        return array_map(function($item) use ($teamId){
            return [
                'team_id' => $teamId,
                'username' => $item['username'],
                'game_user_id' => $item['game_user_id']
            ];
        }, $pending_usernames);
    }

    public function addUserGameId($participants, $values)
    {
        $indexes = array_keys($values);
        return array_map(function($item, $index) use ($values){
            return array_merge($item, ['game_user_id' => $values[$index]]);
        }, $participants, $indexes);
    }

    private function buildParticipantsData2($teamId, $participants)
    {
        return array_map(function($item) use ($teamId){
            return [
                'team_id' => $teamId,
                'user_id' => $item['user_id'],
                'member_type_id' => 2,
                'game_user_id' => $item['game_user_id']
            ];
        }, $participants);
    }

    private function deleteTeamMembers($participants) {
        $pendingUsersModel = model('PendingUserModel');
        foreach ($participants as $participant) {
            $id = $participant['id'];
            if($participant['user_id'] == "-1")
                $pendingUsersModel->delete($id);
            else
                $this->teamMemberModel->delete($id);
        }
    }

    public function updateTeamManagerMember($id, $managerId) {
        $result = $this->teamMemberModel->where(['team_id' => $id, 'member_type_id' => 1])->findAll();
        $data = [
            'id' => $result[0]->id,
            'user_id' => $managerId
        ];
        $result = $this->teamMemberModel->save($data);
    }
}
