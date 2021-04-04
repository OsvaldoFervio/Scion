<?php


namespace App\Controllers;

use App\Entities\User;

class Register extends BaseController
{
    public function index() {
        echo view('include_files/header');
        echo view('include_files/navbar');
        echo view('registro');
        echo view('include_files/footer');
    }

    public function create() {
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'birthdate' => $this->request->getPost('birthdate'),
            'genre' => $this->request->getPost('genre'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];
        $user = new User();
        $user->fill($data);
        $userModel = model('App\Models\UserModel', false);
        $userModel->save($user);
        $this->response->redirect('/');
    }
}