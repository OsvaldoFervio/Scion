<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format = 'json';

    public function index()
    {
        $search = $this->request->getGet('search');
        $type = $this->request->getGet('type');
        $results = $this->model->select('users.id, users.username, users.first_name, users.last_name')
            ->join('team_members', 'users.id = team_members.user_id and team_members.deleted_at is null', 'left')
            ->where('users.role_id', 2)->where('team_members.id is null')->like(' users.username', $search)->findAll();
        return $this->respond(['searchType' => $type, 'data' => $results]);
    }

    public function verify()
    {
        $queryUsername = $this->request->getGet('q');
        $result = $this->model->select('id, first_name, last_name, username, email')
            ->where('username', $queryUsername)->first();
        if($result)
            return $this->respond($result);
        return $this->respond(['error' => 'The server can not find the requested resource'], 404);
    }
}