<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function transferenciaView() {
        return view('painel.realizar-transferencia');
    }
}
