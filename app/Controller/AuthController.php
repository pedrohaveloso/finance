<?php

namespace App\Controller;

class AuthController extends Controller
{
    public function loginAction()
    {
        return $this->view('auth/login');
    }

    public function registerAction()
    {
        return $this->view('auth/register');
    }
}