@extends('painel.app')

@section('linksCSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">--}}

@endsection

@section('conteudo')

    <div class="container my-5">
        <h1 class="display-4 mb-4">Extrato </h1>
        <h5 class="sub-title font-italic">Consultado {{ date('d/m/Y à\s G:i') }}</h5>
        <div class="card">
            <h5 class="card-header">Extrato</h5>
            <div class="p-4">
                <table id="myTable" class="table w-100">
                    <thead>
                        <tr>
                            <td class="text-left">Descrição</td>
                            <td class="text-right">Data</td>
                            <td class="text-right">Valor</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transferenciasIn as $t)
                        <tr>
                            <td class="text-left"><i class='text-muted'>CRÉDITO EM CONTA</i></td>
                            <td class="text-right">{{ Carbon\Carbon::parse($t->created_at)->format('d/m/Y') }}</td>
                            <td class="text-right"><span style="color: blue">{{ number_format($t->valor, 2, ',', '.') }} D</span></td>
                        </tr>
                        @endforeach

                        @foreach($transferenciasOut as $t)
                        <tr>
                            <td class="text-left"><i class='text-muted'>DÉBITO EM CONTA</i></td>
                            <td class="text-right">{{ Carbon\Carbon::parse($t->created_at)->format('d/m/Y') }}</td>
                            <td class="text-right"><span style="color: red">-{{ number_format($t->valor, 2, ',', '.') }} D</span></td>
                        </tr>
                        @endforeach

                        @foreach($depositos as $deposito)
                        <tr>
                            <td class="text-left"><i class="text-muted">DEPÓSITO</i></td>
                            <td class="text-right">{{ Carbon\Carbon::parse($deposito->created_at)->format('d/m/Y') }}</td>
                            <td class="text-right"><span style="color: blue">{{ number_format($deposito->valor, 2, ',', '.') }} C</span></td>
                        </tr>
                        @endforeach

                        @foreach($pagamentos as $pagamento)
                        <tr>
                            <td class="text-left"><i class="text-muted">PAGAMENTO</i></td>
                            <td class="text-right">{{ Carbon\Carbon::parse($pagamento->created_at)->format('d/m/Y') }}</td>
                            <td class="text-right"><span style="color: red">-{{ number_format($pagamento->valor, 2, ',', '.') }} D</span></td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfooter>
                        <tr style="font-size: 20px">
                            <td class="text-left">Saldo:</td>
                            <td colspan="2" class="text-right"><span class="font-weight-bold" style="color: blue">{{ number_format($saldo, 2, ',', '.') }} C</span></td>
                        </tr>
                    </tfooter>

                </table>
            </div>
        </div>
    </div>


@endsection

@section('linksJavaScript')


    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "language": {
                    "lengthMenu": "_MENU_ Por página",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Parece não ter nada aqui",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                }
            });
        } );
    </script>
@endsection