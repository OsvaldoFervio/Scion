<?php

namespace App\Services;

class VideogameService
{

    protected $model = null;

    public function __construct()
    {
        $this->model = model('VideogameModel');
    }

    public function getAll()
    {
        return $this->model->findAll();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }
}