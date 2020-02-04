<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LEDES</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('css/stylePortalDefault.css') }}" rel="stylesheet">


   {{-- Bootstrap 4.1 --}}
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    {{-- AJaAX --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>

   {{-- Para ediçãod de notícia --}}

   <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
   <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>




</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-portalLedes" >
            <!-- Navbar content -->

                <a href="{{ route('home') }}">
                    <img src="{{ asset('image/logoLedes.png') }}"  alt="logoLedes" class="d-inline-block rounded float-left " width="130" height="100" >
                </a>
                {{-- botao  para navegação em mobile--}}
                <button class="navbar-toggler borda" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    {{-- Lado Direito --}}
                    {{-- <ul class="nav navbar-nav navbar-right borda">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul> --}}

                {{-- Menus do NavBar --}}
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="nav" >

                        <li class="nav-item">
                            <a class="corMenu-laranja nav-link " href="{{ route('home') }}">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="corMenu-laranja nav-link" href="#sigFap">Sig Fap</a>
                        </li>
                        <li class="nav-item">
                            <a class="corMenu-laranja nav-link" href="#Redmine">Redmine</a>
                        </li>
                        <li class="nav-item">
                            <a class="corMenu-laranja nav-link" href="{{ route('listProjects') }}">Projetos</a>
                        </li>
                        <li class="nav-item">
                            <a class="corMenu-laranja nav-link" href="{{ route('listMembers') }}">Membros</a>
                        </li>
                        <li class="nav-item">
                            <a class="corMenu-laranja nav-link" href="{{ route('aboutUs') }}">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="corMenu-laranja nav-link" href="{{ route('contact') }}">Contato</a>
                        </li>

                        {{-- Checando se o usuário está logado  --}}
                        @if (Auth::check())
                            <li class="nav-item dropdown">
                                <a  class="nav-link dropdown-toogle"
                                    data-toggle="dropdown"
                                    href="#"
                                    role="button"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    Olá, {{ Auth::user()->login }}
                                </a>
                                {{-- Menu do dropdown    --}}
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Perfil</a>
                                    <a href="#" class="dropdown-item">Configuração</a>
                                    <a class="dropdown-item btn-danger" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                                </div>
                            </li>
                            @else
                                @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="contorno-btn corMenu-roxo nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif
                        @endif

                    </ul>
                </div>

            </nav>

            {{-- Para ser exportado a base do portal em todas as telas do sistema --}}
            <main class="py-1">
                @yield('baseDoPortal')
            </main>




        </div> {{-- Container --}}
        <div class="circulo1 absolute"></div>
        <div class="circulo2 absolute"></div>
        <div class="footer absolute">
            <span>Todos os direitos reservados. Universidade Federal de Mato Grosso do Sul. Copyright © 2020</span>
            <br>
            <span>(067) 3345-7910 /  Faculdade de Computação, Cidade Universitária, CEP 79070-900. Campo Grande - MS</span>
            <span></span>
            <img src="{{  asset('image/icones/ufms.png') }}" class="rounded float-right" alt="ufms" width="60" height="75" style="margin-right:30px;">
        </div>

</body>

</html>
