<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EscanerController extends Controller
{
    public function mostrarVista()
    {
        return view('escaner');
    }
}
