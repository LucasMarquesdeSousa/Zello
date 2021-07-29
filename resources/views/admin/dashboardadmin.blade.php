<!-- <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do administrador</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mask.js') }}"></script>
    <script src="{{ asset('assets/js/bundle.min.js') }}"></script>
    <script type="text/javascript">
        var APP_URL = {!!json_encode(url('/')) !!};
    </script>
   
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>

<body>
    <header class="container-fluid">
        <button class="navbar-toggler" type="button" id="menubtn">
            <i class="icofont-navigation-menu"></i>
        </button>
        <div class="container">
            <a class="name-header" href="{{url('/home')}}"><span>Painel do administrador</span></a>
        </div>
    </header>
    <div class="menu">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action text-nowrap active home" id="list-propostas-list" data-toggle="list" href="#home" role="tab" aria-controls="propostas">HOME</a>
            <a class="list-group-item list-group-item-action text-nowrap aplicativos" id="list-propostas-list" data-toggle="list" href="#aplicativos" role="tab" aria-controls="propostas">Aplicativos</a>
            <a class="list-group-item list-group-item-action text-nowrap meu-perfil" id="list-propostas-list" data-toggle="list" href="#meu-perfil" role="tab" aria-controls="propostas">Meu perfil</a>
            <a class="list-group-item list-group-item-action text-nowrap cadastrar-usuario" id="list-propostas-list" data-toggle="list" href="#cadastrar-usuario" role="tab" aria-controls="propostas">CadastrarUsuario</a>
            
        </div>
    </div> -->
    @extends('layouts.app')
    
    @section('content')
    <div class="pagina">
        <div class="conteudo">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="list-propostas-list">
                    @include('admin.home')
                </div>
                <div class="tab-pane fade" id="aplicativos" role="tabpanel" aria-labelledby="list-profile-list">
                    @include('admin.aplicativos')
                </div>
                <div  class="tab-pane fade"id="meu-perfil" role="tabpanel" aria-labelledby="list-profile-list">
                    @include('editar')
                </div>
                <div class="tab-pane fade" id="cadastrar-usuario" role="tabpanel" aria-labelledby="list-profile-list">
                    @include('admin.cadusuario')
                </div>
                <div class="tab-pane fade" id="ed-usu" role="tabpanel" aria-labelledby="list-profile-list">
                    @include('admin.edusu')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/script4.js') }}"></script>
    @endsection
<!-- </body>

</html> -->