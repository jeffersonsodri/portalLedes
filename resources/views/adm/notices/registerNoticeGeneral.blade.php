@extends('layouts.adm')

@section('baseAdm')
<div class="container">
    <h3 class="card-title titulo">Registrar Notícia</h3>
    <hr style="background-color: #6937FF">
    <div class="row">
            <div class="card col-md-12 contorno-btn">
                <div class="card-body">

                    {{-- Mensagens --}}

                    @if (session('errorImage'))
                        <div class="alert alert-danger col-md-12" style="width:100%; height:50px;">
                            <span>{{session('errorImage')}}</span>
                        </div>
                    @endif

                    {{-- Formulário --}}
                    <form class="form-horizontal" method="post" action="{{ route('saveNoticeGeneral') }}" enctype="multipart/form-data">
                         @csrf

                        {{-- Campo: Título Da notícia --}}
                        <div class="form-group"></div>
                         <div class="form-group row">
                            <label class="control-label col-sm-4 text-sm-right" for="nome">Título:</label>
                            <div class="col-sm-4">
                                <input
                                    required
                                    type="text"
                                    class="form-control"
                                    name="title" id="titulo"
                                    placeholder="Título da notícia"
                                    @if (session('dados')) value="{{ session('dados')['title'] }}"@endif
                                    >
                            </div>
                        </div>

                        {{-- Campo: Descrição --}}
                        <div class="form-group row">
                            <label for="descricao" class="control-label col-sm-2 text-sm-right">Descrição:</label>
                            <div class="col-sm-8">
                                <textarea id="summernote" required class="form-control" id="descricao" name="description" rows="5">
                                    @if (session('dados')) {{ session('dados')['description'] }} @endif
                                </textarea>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>


                        {{-- Campo: Upload Imagem --}}
                        <div class="form-group row">
                            <label class="control-label col-sm-4 text-sm-right" for="imagem" >Thumbnail:</label>
                            <div class="custom-file col-sm-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="image" id="image">
                                    <label class="custom-file-label text-sm-left" for="customFile">Escolha a Imagem</label>
                            </div>
                        </div>

                        {{-- Campo: Anexo (PDF) Ainda tem que ser feito--}}
                        {{-- <div class="form-group row">
                            <label class="control-label col-sm-4 text-sm-right" for="anexo" >Anexo:</label>
                            <div class="custom-file col-sm-3">
                                <input type="file" name="anexo" id="anexo">
                            </div>
                        </div> --}}

                        {{-- Saber quem adicionou a notícia  --}}
                        <input type="hidden" value="{{ Auth::user()->id }}" name="author_id">



                        {{-- Botões : Registar ou Cancelar --}}
                        <div class="form-group row">
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-offset-2 col-sm-8">
                                <a href="{{ route('dashboard') }}" name="cancelar" class="btn btn-danger">Cancelar</a>
                                <button type="submit" name="registrar" class="btn btn-success">Registrar Notícia</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

    </div>


</div>
@endsection
