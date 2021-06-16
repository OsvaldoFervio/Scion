<?php

namespace App\Services;

class TeamService
{
    protected $model = null;

    public function __construct()
    {
        $this->model = model('TeamModel');
    }

    public function create($data)
    {
        $this->model->save($data);
    }
}