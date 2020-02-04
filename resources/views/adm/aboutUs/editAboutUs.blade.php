@extends('layouts.adm')

@section('baseAdm')

<div class="container">
    <h3 class="card-title titulo">EDITAR SOBRE NÓS</h3>
    <hr style="background-color: #6937FF">
    <div class="row">
            <div class="card col-md-12 contorno-btn">
                <div class="card-body">

                    <form class="form-horizontal" method="post" action="{{ route('updateAboutUs', $aboutUs->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="put">

                        {{-- Campo: Descricao --}}
                        <div class="form-group row">
                            <label for="descricao" class="control-label text-sm-right col-sm-2 ">Descrição:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="summernote" name="description" >{{ $aboutUs->description }}</textarea>
                            </div>
                        </div>

                        {{-- Campo: Upload Imagem --}}
                        <div class="form-group row">
                            <label class="control-label col-sm-4 text-sm-right" for="imagem" >Imagem:</label>
                            <div class="custom-file col-sm-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="image" id="image">
                                    <label class="custom-file-label text-sm-left" for="customFile">{{ $aboutUs->image }}</label>
                            </div>
                        </div>

                        {{-- Botões : Registar ou Cancelar --}}
                        <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-offset-2 col-sm-8">
                            <a href="{{ route('dashboard') }}" name="cancelar" class="btn btn-danger">Cancelar</a>
                            <button type="submit" name="registrar" class="btn btn-success">Editar Sobre Nós</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
