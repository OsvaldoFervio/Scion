<?php


namespace App\Controllers;


class Events extends BaseController
{
    public function show() {
        echo view('eventos');
    }

    public function new() {
        echo view('event_form');
    }

    public function create() {

    }
}