<?php


namespace App\Controllers;


class Register extends BaseController
{
    public function index() {
        echo view('include_files/header');
        echo view('include_files/navbar');
        echo view('registro');
        echo view('include_files/footer');
    }
}