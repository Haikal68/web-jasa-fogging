<?php

namespace App\Controllers;

class user extends BaseController
{
    public function index(): string
    {
        return view('landingPage/index');
    }
}
