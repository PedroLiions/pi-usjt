<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transferencia;
use App\User;

class TransferenciaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function create()
    {
//        $deposito = new UserController();
//        $saldo = $deposito->saldo();
//        return $saldo;
        return view('painel.transferencia.create');
    }

    // Classe para fornecer as informacoes do receptor da transferencia
    public function verificaReceptor(Request $request)
    {
        // linha apenas para teste
        $request->cpf = 1234;
        // fim linha de teste
        $user_receptor_id = User::where('cpf', $request->cpf)->select('id', 'cpf', 'name')->first();

        return $user_receptor_id;
    }

    public function store(Request $request, Transferencia $transferencia, User $usuario)
    {
        $user_receptor_id = User::where('cpf', $request->cpf)->select('id')->first();

        // Caso o CPF não exista
        if(! $user_receptor_id ) {
            return back()->with('message', 'CPF inválido');
        }

        // Caso o usuário não pussua saldo para a tranferencia
        if( $usuario->saldo() < $request->valor ) {
            return back()->with('message', 'Saldo insuficiente');
        }

        // Realizar a transferencia
        $transferencia->valor                   = $request->valor;
        $transferencia->user_pagador_id         = auth()->user()->id;
        $transferencia->user_receptor_id        = $user_receptor_id->id;
        // Salvar no banco de dados
        $transferencia->save();

        // Voltar para a rota home
        return redirect()->route('home')->with('message', 'Transferencia realizada com sucesso!');
    }
}
