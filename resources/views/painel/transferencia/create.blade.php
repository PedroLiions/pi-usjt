@extends('painel.app')

@section('conteudo')

    <div class="container">
        <h1 class="display-4 mb-4">Transferencia</h1>
        <form action="{{ route('TransferenciaStore') }}" method="post">
            <div class="card">
                <h5 class="card-header">Transferencia</h5>
                <div class="card-body">
                    <h5 class="card-title">Para:</h5>
                    <hr>

                    @csrf

                    <div class="form-row">
                        <div class="col-12">
                            <label for="cpf" class="label">CPF</label>
                            <input name="cpf" id="cpf" type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="agencia" class="label">Agencia</label>
                            <input name="agencia" id="agencia" type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="conta" class="label">Conta</label>
                            <input name="conta" id="conta" type="text" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="valor" class="label">Valor a ser transferido</label>
                            <input name="valor" id="valor" type="text" class="form-control">
                        </div>
                        <div class="col-12 my-4">
                            <button class="btn btn-primary w-100">Ir</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection