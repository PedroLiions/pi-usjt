<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transferencia;
use App\User;

class TransferenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
//        $deposito = new UserController();
//        $saldo = $deposito->saldo();
//        return $saldo;
        return view('painel.transferencia.create');
    }

    public function store(Request $request, Transferencia $transferencia)
    {
        $user_receptor_id = User::where('cpf', $request->cpf)->select('id')->first();

        if(! $user_receptor_id)
        {
            return back()->with('message', 'CPF inválido');
        }

        $transferencia->valor                   = $request->valor_transferido;
        $transferencia->user_pagador_id         = auth()->user()->id;
        $transferencia->user_receptor_id        = $user_receptor_id->id;
        $transferencia->save();

        return redirect()->route('home');
    }
}
