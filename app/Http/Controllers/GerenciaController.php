<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    public function Gerencia() {
        return view('site.gerencia');
    }
}
