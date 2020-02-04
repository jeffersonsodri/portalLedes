@extends('layouts.adm')


@section('baseAdm')
<div class="container">
<div class="card-title titulo"><h2>Lista de Usuários</h2></div>
<hr style="background-color: #6937FF">
    <div class="panel panel-default">


            <a type="button" href="{{ route('registerUsers') }}" class="btn btn-success col-sm-2" style="display:block;">Adicionar Usuário</a>



            <div>
                {{-- Mensagens --}}
                @if (session('success'))
                <div class="alert alert-success col-md-12" style="width:100%; height:50px;">
                    <span>{{session('success')}}</span>
                </div>
                @endif
                @if (session('deleted'))
                <div class="alert alert-dark col-md-12" style="width:100%; height:50px;">
                    <span>{{session('deleted')}}</span>
                </div>
                @endif
                @if (session('edited'))
                <div class="alert alert-success col-md-12" style="width:100%; height:50px;">
                    <span>{{session('edited')}}</span>
                </div>
                @endif

                @if (session('not-auth'))
                <div class="alert alert-danger col-md-12" style="width:100%; height:50px;">
                    <span>{{session('not-auth')}}</span>
                </div>
                @endif

            </div>
                {{-- tabela --}}
                <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="margin-top:10px;">
                        <thead class="thead-dark ">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Função</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if (Auth::user()->login != $user->login)

                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td> - </td>
                                    <td>
                                        <a href="{{ route('editUser', $user->id) }}" style="margin-left:8px;">
                                                <img src="{{ asset('image/icones/editar.png') }}" alt="editar" width="30" height="30">
                                            </a>
                                            <a href="{{ route('deleteUser', $user->id) }}" style="margin-left:8px;">
                                                    <img src="{{ asset('image/icones/delete.png') }}" alt="deletar" width="30" height="30">
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

            </div>

    </div>
</div>
@endsection
