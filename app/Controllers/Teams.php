<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Teams extends BaseController
{
    protected $service = null;

    public function __construct()
    {
        $this->service = service('team');
    }

    public function create()
    {
        $data = $this->request->getPost();
        //echo json_encode($data);
        $this->service->create($data);
    }
}