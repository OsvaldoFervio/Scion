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
        $results = $this->model->select('id, username, first_name, last_name')
            /*->where('role_id', 2)*/->like('username', $search)->findAll();
        return $this->respond(['searchType' => $type, 'data' => $results]);
    }
}