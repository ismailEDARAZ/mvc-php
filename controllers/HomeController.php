<?php

namespace Controllers;

use Core\View;
use Models\User;

class HomeController 
{
    public function index()
    {
        $users = User::all("users");
        return View::make('index', compact('users'));
    }

    public function contact()
    {
        return View::make('contact');
    }
}