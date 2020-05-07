<?php

namespace App\Http\Controllers;

use App\Models\Users;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login()
    {
        (new Users)->login(request()->all());
    }

    public function register()
    {
        return view('login.register');
    }
}
