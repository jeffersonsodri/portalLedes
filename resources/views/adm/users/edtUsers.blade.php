@extends('layouts.adm')

@section('baseAdm')
<hr style="background-color: #6937FF">
<div>

    <div class="row">

        <div class="col-md-2"></div>
        <div class="card col-md-8 contorno-btn">
            <div class="card-body">
                <h3 class="card-title text-center titulo">Editar Usuário</h3>
                <form class="form-horizontal" method="post" action="{{ route('updateUser', $user->id) }}">
                    @csrf
                    {{-- Determinando que é um UPDATE --}}
                    <input type="hidden" name="_method" value="put">
                   
                   
                    {{-- Campo: Nome --}}
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-sm-right" for="name">Nome completo:</label>
                        <div class="col-sm-6">
                            <input  value="{{ $people->name }}" required type="text" class="form-control" name="name" id="name" placeholder="Nome Completo">
                        </div>
                    </div>

                    {{-- Campo: Email --}}
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-sm-right" for="email">Email:</label>
                        <div class="col-sm-6">
                            <input value="{{ $people->email }}" required type="email" class="form-control" name="email" id="email" placeholder="Coloque email">
                        </div>
                        <div class="col-sm-2"></div>
                    </div>

                    {{-- Escolha de Editor ou Administrador --}}
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-sm-right" for="permission" >Função:</label>
                        <div class="col-sm-6">
                            <select name="permission" class="form-control" required>
                                <option selected value="{{ $permission }}" class="text-default">{{ $permission }}</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Editor">Editor</option>
                            </select>
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>

                    <div class="form-group row"></div>
                    <div class="form-group row"></div>
                    <div class="form-group row"></div>

                    {{-- Campo: Login --}}
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-sm-right" for="login">Login:</label>
                        <div class="col-sm-6">
                            <input value="{{ $user->login }}" required type="text" class="form-control" name="login" id="login" placeholder="Login">
                        </div>
                        <div class="col-sm-2"></div>
                    </div>



                    {{-- Campo: Senha --}}
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-sm-right" for="password">Senha:</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Digite uma nova senha">
                        </div>
                    </div>

                    {{-- Campo: Confirmar Senha --}}
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-sm-right" for="confPassword">Confirme Senha:</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="confPassword" id="confPassword" placeholder="Confirme a senha">
                        </div>
                    </div>



                    {{-- Botão de registrar --}}
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-offset-2 col-sm-8">
                            <a href="{{ route('dashboard') }}" name="cancelar" class="btn btn-danger">Cancelar</a>
                            <button type="submit" name="registrar" class="btn btn-success">Editar Usuário</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="col-md-2"></div>
    </div>{{-- row --}}
</div>
@endsection
