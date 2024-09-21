<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Crear el metodo principal del aplicativo
    public function index()
    {
        //return vi
        return view('home');
    }
}
