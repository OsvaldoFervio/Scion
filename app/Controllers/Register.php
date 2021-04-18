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
        if($this->validate('signup')) {
            $data = $this->request->getPost();
            $user = new User();
            $user->fill($data);
            $userModel = model('App\Models\UserModel', false);
            $userModel->save($user);
            $this->response->redirect('/');
        } else {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
    }
}