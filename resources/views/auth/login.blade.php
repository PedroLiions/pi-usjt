@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                @if( session('erro') )
                <div class="alert alert-{{ session('erro')->tipo }} alert-dismissible fade show" role="alert">
                    {{ session('erro')->mensagem }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('autenticar') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-4">
                                <label for="">Agencia</label>
                                <input id="agencia" type="agencia" class="form-control" name="agencia" value="{{ session('input')['agencia'] }}" required autofocus>
                            </div>

                            <div class="col-md-8">
                                <label for="">Conta</label>
                                <input id="conta" type="conta" class="form-control" name="conta" value="{{ session('input')['conta'] }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="">Senha</label>
                                <input id="password" type="password" class="form-control" name="password" value="{{ session('input')['password'] }}" required>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label for="">Token</label>
                                    <input id="token" type="token" class="form-control" name="token" value="{{ session('input')['token'] }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6Lfmmk4UAAAAACY6fqavfAgIUASB3LYcMW3Wps4J"></div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    Acessar
                                </button>

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--{{ __('Forgot Your Password?') }}--}}
                                {{--</a>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src='https://www.google.com/recaptcha/api.js'></script>

@endsection
