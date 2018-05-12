<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transferencia;
use App\Pagamento;
use App\Deposito;

class UserController extends Controller
{
    public function saldo() {
        $transferenciaIn    = Transferencia::where('user_receptor_id', auth()->user()->id)->sum('valor');
        $transferenciaOut   = Transferencia::where('user_pagador_id', auth()->user()->id)->sum('valor');
        $deposito           = Deposito::where('user_id', auth()->user()->id)->sum('valor');
        return ($deposito + $transferenciaIn) - $transferenciaOut;
    }
}
