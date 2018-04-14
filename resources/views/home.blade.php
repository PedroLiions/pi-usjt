@extends('painel.app')

@section('conteudo')
    <div class="container-fluid whiteBg">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="light-grayF sk-ml-title alfaSlab">Home</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center light-grayF">
                <!-- Mensagem para usuário -->
                <h1><label id="idUsuário">{{ auth()->user()->name  }},</label></h1>
                <h2>Por onde começamos?</h2>
            </div>
        </div>
        <div class="mx-5 mt-3">
            <div class="row">
                <!-- Botão para transferência -->
                <div class="col-lg-4">
                    <a href="{{ route('TransferenciaCreate') }}">
                        <button type="button" class="btn btn-block greenBg dark-grayF py-4 mb-2 btn-lg">transferir dinheiro</button>
                    </a>
                </div>
                <!-- Botão para extrato -->
                <div class="col-lg-4">
                    <a href="{{ route('ExtratoIndex') }}">
                        <button type="button" class="btn btn-block greenBg dark-grayF py-4 mb-2 btn-lg">checar extrato</button>
                    </a>
                </div>
                <!-- Botão para pagamento -->
                <div class="col-lg-4">
                    <a href="pagamento.php">
                        <button type="button" class="btn btn-block greenBg dark-grayF py-4 mb-2 btn-lg">pagar contas</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
