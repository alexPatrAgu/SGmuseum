<?php

namespace App\Controllers;

class WelcomeController extends BaseController
{
    public function index()
    {
        // Este método solo carga la vista 'welcome' cuando accedes a la raíz del sitio
        return view('welcome');
    }
}
