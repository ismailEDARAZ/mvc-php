<?php

namespace Controllers;

use Core\View;

class HomeController 
{
    public function index()
    {
        return View::make('index');
    }

    public function contact()
    {
        return View::make('contact');
    }
}