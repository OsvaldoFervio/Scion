<?php

namespace App\Services;

use CodeIgniter\Exceptions\PageNotFoundException;

class UserService
{
    protected $model = null;

    function __construct(){
        $this->model = model('UserModel');
    }

    public function activate($idUser)
    {
        $data = ['active' => 1];
        $this->model->update($idUser,$data);
    }

    public function block($idUser)
    {
        $data = ['active' => 0];
        $this->model->update($idUser,$data);
    }

   public function getById($id) {
          $result = $this->model->find($id)->row();
           //$result = $this->model->get_where('user_id' = $id);

        if(! $result)
            throw PageNotFoundException::forPageNotFound('Esta página no existe');
        return $result;
    }

    private function buildUserData($data, $userId = null)
    {
        var_dump($data['user']);
        $array = [];
        if($userId)
            $array['user']['user_id'] = $userId;
        $array['user']['role_id'] = $data['role_id'];
        $array['gender_id'] = $data['gender_id'];
        $array['first_name'] = $data['first_name'];
        $array['last_name'] = $data['last_name'];
        $array['birthdate'] = $data['birthdate'];
        $array['email'] = $data['email'];
        $array['username'] = $data['username'];
        $array['password'] = $data['password'];
        $array['activate'] = 1;

        return $array;
    }
}