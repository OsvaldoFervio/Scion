<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        echo view('include_files/header');
        echo view('include_files/navbar');
        echo view('login');
        echo view('include_files/footer');

        if (isset($_GET["user"])) {
            $user = $_GET["user"];
            $this->activate($user);
        }
    }

    public function post()
    {
        helper('password');
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];
        $userModel = new UserModel;
        $array = ['email' => $data['email'], 'active' => 1];
        $result = $userModel->where($array)->first();
        if ($result) {
            if (check_password($data['password'], $result->password)) {
                $session = session();
                $session->set([
                    'user_id' => $result->id,
                    'role_id' => $result->role_id,
                    'username' => $result->username
                ]);
                if ($result->role_id == 1)
                    return redirect()->redirect('Dashboard');
                if ($result->role_id == 2)
                    return redirect()->redirect('Home/');
            }
        }        

        return redirect()->back()->with('error', 'Datos incorrectos');
    }

    public function activate($user)
    {
        $username = ['username' => $user];
        $userModel = new UserModel;
        $result = $userModel->where('username', $username['username'])->first();

        if ($result) {
            $id = $result->id;
            $data = ['active' => 1];
            $userModel->update($id, $data);
        }
    }
}
