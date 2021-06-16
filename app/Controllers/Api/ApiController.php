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
        $results = $this->model->select('id, username')
            /*->where('role_id', 2)*/->like('username', $search)->findAll();
        return $this->respond($results);
    }
}