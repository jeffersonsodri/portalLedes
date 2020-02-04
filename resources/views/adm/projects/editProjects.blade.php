@extends('layouts.adm')

@section('baseAdm')

<div class="container">
    <h3 class="card-title titulo">EDITAR PROJETO</h3>
    <hr style="background-color: #6937FF">
    <div class="row">
            <div class="card col-md-12 contorno-btn">
                <div class="card-body">

                    <form class="form-horizontal" method="post" action="{{ route('updateProject', $project->id) }}" enctype="multipart/form-data">
                         @csrf
                         <input type="hidden" name="_method" value="put">
                         <div class="form-group"></div>
                         
                         {{-- Campo: Nome Completo --}}
                         <div class="form-group row">
                            <label class="control-label col-sm-4 text-sm-right" for="nome">Nome Projeto:</label>
                            <div class="col-sm-4">
                                <input required type="text" value="{{ $project->name }}" class="form-control" name="name" id="name" placeholder="Nome Projeto">
                            </div>
                        </div>

                        {{-- Campo: Descrição --}}
                        <div class="form-group row">
                            <label for="descricao" class="control-label col-sm-12 ">Descrição:</label>
                            <div class="col-sm-12">
                                <textarea id="summernote" required class="form-control" id="description" name="description" rows="5">{{ $project->description }}</textarea>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>


                        {{-- Campo: Upload Imagem --}}
                        <div class="form-group row">
                            <label class="control-label col-sm-2 text-sm-right" for="image" >Logo:</label>
                            <div class="custom-file col-sm-6">
                                <input type="file" class="custom-file-input" id="customFile" name="image" id="image">
                                <label class="custom-file-label text-sm-left" for="customFile">{{ $project->image }}</label>
                            </div>
                        </div>

                        {{-- Data Inicio --}}
                        <div class="form-group row">
                            <label class="control-label col-sm-2 text-sm-right" for="dateInception">Data Início:</label>
                            <div class="col-sm-3">
                                <input required type="date" value="{{ $project->dateInception }}" class="form-control" name="dateInception" id="dateInception" placeholder="DD/MM/AAAA">
                            </div>
                            <label class="control-label col-sm-2 text-sm-right" for="dateEnd">Data Fim:</label>
                            <div class="col-sm-3">
                                <input required type="date"value="{{ $project->dateEnd }}" class="form-control" name="dateEnd" id="dateEnd" placeholder="DD/MM/AAAA">
                            </div>
                        </div>


                        {{-- Botões : Registar ou Cancelar --}}
                        <div class="form-group row">
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-offset-2 col-sm-8">
                                <a href="{{ route('dashboard') }}" name="cancelar" class="btn btn-danger">Cancelar</a>
                                <button type="submit" name="registrar" class="btn btn-success">Editar Projeto</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        
    </div>


</div>
@endsection
