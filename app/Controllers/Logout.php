<?php


namespace App\Controllers;


class Logout extends BaseController
{
    public function post() {
        if(session()->get('user_id'))
        {
            session()->destroy();
            return redirect()->redirect('/');
        }
    }
}