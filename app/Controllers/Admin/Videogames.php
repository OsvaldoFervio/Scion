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
        $platforms = $this->service->getPlatforms($id);
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/game', ['videogame' => $data, 'platforms' => $platforms]);
        echo view('Admin/footer');
    }

    public function new()
    {
        $platformModel = model('PlatformModel');
        $data = $platformModel->findAll();

        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/game_form', ['platforms' => $data]);
        echo view('Admin/footer');
    }

    public function create()
    {
        $data = $this->request->getPost();
        $image = $this->request->getFile('image');
        $this->service->create($data, $image);
        return redirect()->to(base_url('admin/videogames/new'))->with('success', 'Videojuego creado');
    }

    public function edit($id)
    {
        $data = $this->service->getById($id);
        $platforms = $this->service->getPlatforms($id);
        echo view('Admin/head');
        echo view('Admin/leftnav');
        echo view('Admin/game_edit', ['videogame' => $data, 'platforms' => $platforms]);
        echo view('Admin/footer');
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->service->update($id, $data);
        return redirect()->to(base_url('admin/videogames/edit/'.$id))->with('success', 'Juego actualizado');
    }

    public function delete($id)
    {
        $this->service->delete($id);
        return redirect()->to(base_url('admin/videogames'))->with('success', 'Videojuego eliminado');
    }
}