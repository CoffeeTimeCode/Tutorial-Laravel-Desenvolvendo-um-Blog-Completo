<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <style media="screen">
    .avatar{
      border-radius: 50%;
      position: relative;
      top: -7px;
      float: left;
      left: -8px;
    }
  </style>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <img src="{{ Auth::user()->avatar }}" class="avatar" width="36"> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
          <div class="col-md-3">
            <ul class="list-group">
              <li class="list-group-item"><h4 class="text-center">Menu</h4></li>
              @if(Auth::user()->level>=0)
                <!--<li class="list-group-item text-center">Usuário: Leitor</li>-->
                <li class="list-group-item"> <a href="{!! url('/painel/configuracoes') !!}">-> Configurações</a> </li>
              @endif
              @if(Auth::user()->level>=1)
                <!--<li class="list-group-item text-center">Usuário: Revisor</li>-->
                <li class="list-group-item text-center"><h4>Posts</h4></li>
                <li class="list-group-item"> <a href="{!! url('/painel/tags') !!}">-> Tags</a> </li>
                <li class="list-group-item"> <a href="{!! url('/painel/categorias') !!}">-> Categorias</a> </li>

              @endif
              @if(Auth::user()->level>=2)
                <li class="list-group-item text-center"><h4>Usuários</h4></li>
                <li class="list-group-item"> <a href="{!! url('/painel/criar-usuario') !!}">-> Criar Usuário</a> </li>
                <li class="list-group-item"><a href="{!! url('/painel/listar-usuarios') !!}">-> Listar Usuários</a> </li>

                <li class="list-group-item text-center"><h4>Uplaod</h4></li>
                <li class="list-group-item"> <a href="{!! url('/painel/upload-arquivos') !!}">-> Arquivos</a> </li>
              @endif
            </ul>
          </div>
          <div class="col-md-9">
            @yield('content')
          </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
