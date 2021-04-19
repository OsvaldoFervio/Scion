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
	}

	public function post() {
        helper('password');
	    $data = [
	        'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];
        $userModel = new UserModel;
        $result = $userModel->where('email', $data['email'])->first();
        if($result) {
            if (check_password($data['password'], $result->password)) {
                $session = session();
                $session->set([
                    'user_id' => $result->id,
                    'role_id' => $result->role_id,
                    'username' => $result->username
                ]);
                return redirect()->redirect('/');
            }
        }
        return redirect()->back()->with('error', 'Datos incorrectos');
    }
}
