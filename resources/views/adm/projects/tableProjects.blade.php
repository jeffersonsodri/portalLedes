@extends('layouts.adm')


@section('baseAdm')
<div class="titulo"><h2>LISTA DE PROJETOS</h2></div>
<hr style="background-color: #6937FF">
<div class="container">
    <div class="panel panel-default">

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
            <a type="button" href="{{ route('registerProjects') }}"
                class="btn btn-success col-sm-2" style="display:block;">Adicionar Projetos</a>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered"  style="margin-top:10px;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Autor</th>
                                <th>Data Inicio</th>
                                <th>Data Fim</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->author }}</td>
                                <td>{{ $project->dateInception }}</td>
                                <td>{{ $project->dateEnd }}</td>
                                <td>
                                    <a href="{{ route('editProject', $project->id) }}" style="margin-left:8px;">
                                        <img src="{{ asset('image/icones/editar.png') }}" alt="editar" width="30" height="30">
                                    </a>
                                    <a href="{{ route('deleteProject', $project->id) }}" style="margin-left:8px;">
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
    </div>
</div>
@endsection
