@extends('layouts.adm')


@section('baseAdm')
<div class="container">
<div class="card-title titulo"><h2>LISTA DE MEMBROS</h2></div>
<hr style="background-color: #6937FF">
    <div class="panel panel-default">
            <a type="button" href="{{ route('registerMembers') }}"
                class="btn btn-success col-sm-2" style="btn-display:block;  ">Adicionar Membro</a>
            <div class="row container">

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


                {{-- Tabela --}}
                    <table class="table table-bordered col-md-12"  style="margin-top:10px;">
                        <thead class="thead-dark ">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Curso</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $members as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->course }}</td>
                                <td>
                                    <a  href="{{ route('editMembers', $member->id) }}" style="margin-left:8px;">
                                        <img src="{{ asset('image/icones/editar.png') }}" alt="editar" width="30" height="30">
                                    </a>
                                    <a  href="{{ route('deleteMember', $member->id) }}" style="margin-left:8px;">
                                        <img src="{{ asset('image/icones/delete.png') }}" alt="deletar" width="30" height="30">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


            </div>

    </div>
</div>
@endsection
