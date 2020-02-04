@extends('layouts.adm')

@section('baseAdm')

<div class="titulo"><h2>Lista de Notícias do Site</h2></div>
<hr style="background-color: #6937FF">
<div class="container">
    <div class="panel panel-default">
            {{-- Mensagens  --}}
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

            {{-- tabela --}}
            <a type="button" href="{{ route('registerNoticeGeneral') }}"
                class="btn btn-success col-sm-2" style="display:block;">Adicionar Notícia</a>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered"  style="margin-top:10px;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Data Criação</th>
                                <th>Última Modificação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $notice)
                            <tr>
                                <td>{{ $notice->title }}</td>
                                <td>{{ $notice->author }}</td>
                                <td>{{ $notice->date }}</td>
                                <td>{{ $notice->updated_at }}</td>
                                <td>
                                    <a href="{{ route('editNoticeGeneral', $notice->id) }}" style="margin-left:8px;">
                                        <img src="{{ asset('image/icones/editar.png') }}" alt="editar" width="30" height="30">
                                    </a>
                                    <a href="{{ route('deleteNoticeGeneral', $notice->id) }}" style="margin-left:8px;">
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
