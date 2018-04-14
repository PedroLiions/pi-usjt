<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transferencia;
use App\Pagamento;
use App\Deposito;

class ExtratoController extends Controller
{
    public function extratos()
    {
        $transferenciasIn = Transferencia::where('user_receptor_id', auth()->user()->id)->get();
        $transferenciasOut = Transferencia::where('user_pagador_id', auth()->user()->id)->get();
        $depositos = Deposito::where('user_id', auth()->user()->id)->get();
        $pagamentos = Pagamento::where('user_id', auth()->user()->id)->get();

        $saldo = User::saldo();

        return view('painel.extrato.index', compact(['transferenciasIn', 'transferenciasOut', 'depositos', 'pagamentos', 'saldo']));
    }
}
