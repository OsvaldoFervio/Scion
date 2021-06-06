<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Videogames extends BaseController {

    protected $service = null;

    public function __construct()
    {
        $this->service = service('videogame');
    }

    public function index()
    {

        $data = $this->service->getAll();

        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/games', ['videogames' => $data]);
        echo view('Admin/footer');
    }

    public function show($id)
    {
        $data = $this->service->getById($id);
        return json_encode($data);
    }

    public function new() {

    }
}