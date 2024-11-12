<?php

namespace App\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->view('home/index');
    }
}