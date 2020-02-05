<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADM LEDES</title>

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylePortalDefault.css') }}" rel="stylesheet">
    <link href="summernote.css" rel="stylesheet">

    {{-- Bootstrap 4.1 --}}
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"  ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.map"></script> --}}


    {{-- Para ediçãod de notícia --}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src="summernote.min.js"></script>




    <script>
            $(document).ready(function() {

                $('#summernote').summernote({
                    height: 400,
                    tabsize: 2,
                });

                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });

                $('#addMember').click(function(e){
                    e.preventDefault();
                    $('#memberModal').modal('show');
                    $('#addMember')[0].reset();
                    $('#form_output').html('');
                    $('#button_action').val('insert');
                    $('#action').val('Adicionar');

                    $('#memberAdd_form').on("submit", function(event){
                        event.preventDefault();

                        var form_data = $(this).serialize();
                        $.ajax({
                            url: "{{ route('membersToProject') }}",
                            method: 'POST',
                            data: form_data,
                            dataType: 'json',
                            success:function(data){
                                alert('Adicionei');
                                if(data.error.length > 0){
                                    var error_html = '';
                                    for (let index = 0; index < data.error.length; index++) {
                                        error_html += '<div class="alert alert-danger">' + data.error[index] + '</div>';
                                    }
                                    $('#form_output').html(error_html);
                                }else {
                                    $('#form_output').html(data).success;
                                    $('#addMember_form')[0].reset();
                                    $('#action').val('Adicionar');
                                    $('.modal-title').text('Adicionar Membro');
                                    $('#button_action').val('insert');

                                    alert("Aqui foi adicionado com sucesso!");
                                    // $('#memberPage').ajax.reload();

                                }
                            },

                        });
                        // .done(function(msg){
                        //         $("#newMember").html(msg);
                        // });

                    });


                });

            });

    </script>


</head>
<body>
        <div class="container" style="position: relative;">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a href="{{ route('dashboard') }}" >
                    <img src="{{ asset('image/logoLedes.png') }}"  alt="logoLedes" class="d-inline-block rounded float-left " width="140" height="110" >
                </a>
                {{-- botao  para navegação em mobile--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="nav">
                        <li class="nav-item">
                            <a style="color:aliceblue;" class="contorno-btn corMenu-roxo nav-link"
                            href="{{ route('tableNoticeGeneral') }}">{{ __('Gerenciar Notícias') }}</a>
                        </li>

                        @can('view', App\User::class)

                        <li class="nav-item">
                            <a style="color:aliceblue;" class="contorno-btn corMenu-roxo nav-link"
                            href="{{ route('tableMembers') }}">{{ __(' Gerenciar Membros') }}</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:aliceblue;" class="contorno-btn corMenu-roxo nav-link"
                            href="{{ route('tableUsers') }}">{{ __('Gerenciar Usuários') }}</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:aliceblue;" class="contorno-btn corMenu-roxo nav-link"
                            href="{{ route('tableProjects') }}">{{ __('Gerenciar Projetos') }}</a>
                        </li>

                        <li class="nav-item">
                            <a style="color:aliceblue;" class="contorno-btn corMenu-roxo nav-link"
                            href="{{ route('editAboutUs', 1) }}">{{ __('Gerenciar Sobre Nós') }}</a>
                        </li>
                        @endcan


                        {{-- Checando se o usuário está logado  --}}
                        @if (Auth::check())
                            <li class="nav-item dropdown">
                                <a  class="nav-link dropdown-toogle contorno-btn corMenu-laranja"
                                    data-toggle="dropdown"
                                    href="#"
                                    role="button"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    <img style="margin-right: 5px;" src="{{asset('image/icones/user.png')  }}" alt="foto" class="rounded-circle" width="38" height="38">
                                {{ Auth::user()->login}}</a>
                                {{-- Menu do dropdown    --}}
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Perfil</a>
                                    <a href="#" class="dropdown-item">Configuração</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                                </div>
                            </li>
                            @else
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="contorno-btn corMenu-roxo nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="contorno-btn corMenu-roxo nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                                @endif
                        @endif
                    </ul>
                </div>
            </nav>

            {{-- Para ser exportado a base do portal em todas as telas do sistema           --}}

            @yield('baseAdm')


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


{{-- <footer class="footer">
</footer> --}}

</html>
