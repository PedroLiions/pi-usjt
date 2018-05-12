<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Seu dinheiro protegido a sete chaves">
    <meta name="author" content="7keys">

    <title>7keys</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="/font-awesome/web-fonts-with-css/css/fontawesome-all.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Archia WebFont -->
    <link rel="stylesheet" href="/css/Archia/stylesheet.css">

    <!-- Alfa Slab One WebFont -->
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">

    <!-- CSS próprio -->
    <link  rel="stylesheet" href="/css/sk-class.css">

    @yield('linksCSS')
</head>

<body>
<!-- Menu -->
<nav class="navbar navbar-expand-md navbar-dark dark-grayBg whiteF py-3 mb-4">
    <a class="navbar-brand alfaSlab px-4" href="#">7keys</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon greenF"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav">
            <!-- Home -->
            <li class="nav-item px-4">
                <a class="nav-link" href="{{ route('home') }}" data-toggle="tooltip" data-placement="bottom" title="Home" ><i class="fas fa-home fa-md itemPad"></i></a>
            </li>
            <!-- Transferência -->
            <li class="nav-item px-4">
                <a class="nav-link" href="{{ route('TransferenciaCreate') }}" data-toggle="tooltip" data-placement="bottom" title="Transferência bancária"><i class="fas fa-exchange-alt fa-md"></i></a>
            </li>
            <!-- Extrato -->
            <li class="nav-item px-4">
                <a class="nav-link" href="{{ route('ExtratoIndex') }}" data-toggle="tooltip" data-placement="bottom" title="Extrato"><i class="fas fa-file-alt fa-md"></i></a>
            </li>
            <!-- Pagar contas -->
            <li class="nav-item px-4">
                <a class="nav-link" href="{{ route('PagamentoCreate') }}" data-toggle="tooltip" data-placement="bottom" title="Pagar contas"><i class="fas fa-dollar-sign fa-md"></i></a>
            </li>
            <!-- Sair -->
            <li class="nav-item px-4">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Sair
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
<!-- Fim do menu -->

@yield('conteudo')

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

@yield('linksJavaScript')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>