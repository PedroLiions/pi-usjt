<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Http\Request;
use App\User;
use App\Transferencia;
use App\Pagamento;
use App\Deposito;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'agencia', 'conta'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function saldo() {
        $transferenciaIn    = Transferencia::where('user_receptor_id', auth()->user()->id)->sum('valor');
        $transferenciaOut   = Transferencia::where('user_pagador_id', auth()->user()->id)->sum('valor');
        $deposito           = Deposito::where('user_id', auth()->user()->id)->sum('valor');

        return $deposito + $transferenciaIn - $transferenciaOut;
    }

}
