@extends('layouts.adm')

@section('baseAdm')
<div class="container">
    <h3 class="card-title titulo">REGISTRAR PROJETO</h3>
    <hr style="background-color: #6937FF">
    <div class="row">
            <div class="card col-md-12 contorno-btn">
                <div class="card-body">
                    {{-- Mensagem de erro da Imagem --}}
                    @if (session('errorImage'))
                        <div class="alert alert-danger col-md-12" style="width:100%; height:50px;">
                            <span>{{session('errorImage')}}</span>
                        </div>
                    @endif

                    {{-- Formulário --}}
                    <form class="form-horizontal" method="post" action="{{ route('saveProjects') }}" enctype="multipart/form-data">
                         @csrf

                        {{-- Campo: Nome Completo --}}
                        <div class="form-group"></div>
                         <div class="form-group row">
                            <label class="control-label col-sm-4 text-sm-right" for="name">Nome Projeto:</label>
                            <div class="col-sm-4">
                                <input required @if (session('dados')) value="{{ session('dados')['name'] }}"@endif  type="text" class="form-control" name="name" id="name" placeholder="Nome Projeto">
                            </div>
                        </div>

                        {{-- Campo: Descrição --}}
                        <div class="form-group row">
                            <label for="description" class="control-label col-sm-12 ">Descrição:</label>
                            <div class="col-sm-12">
                                <textarea
                                    id="summernote"
                                    style="text-align: left;"
                                    required
                                    class="form-control"
                                    id="description"
                                    name="description"
                                    rows="5">
                                @if (session('dados')) {{ session('dados')['description'] }}@endif
                                </textarea>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>


                        {{-- Campo: Upload Imagem --}}
                        <div class="form-group row">
                                <label class="control-label col-sm-4 text-sm-right" for="image" >Logo:</label>
                                <div class="custom-file col-sm-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="image" id="image">
                                        <label class="custom-file-label text-sm-left" for="customFile">Escolha a Imagem</label>
                                </div>
                            </div>


                        <br>

                        {{-- Data Inicio  e Data Fim--}}
                        <div class="form-group row">
                            <label class="control-label col-sm-2 text-sm-right" for="dateInception">Data Início:</label>
                            <div class="col-sm-3">
                                <input
                                    @if (session('dados')) value="{{ session('dados')['dateInception'] }}"@endif
                                    required
                                    type="date"
                                    class="form-control"
                                    name="dateInception"
                                    id="dateInception"
                                    placeholder="DD/MM/AAAA">
                            </div>
                            <label class="control-label col-sm-2 text-sm-right" for="dateEnd">Data Fim:</label>
                            <div class="col-sm-3">
                                <input
                                    @if (session('dados')) value="{{ session('dados')['dateEnd'] }}"@endif
                                    required
                                    type="date"
                                    class="form-control"
                                    name="dateEnd"
                                    id="dateEnd"
                                    placeholder="DD/MM/AAAA">
                            </div>
                        </div>


                        {{-- Pegar o id do adm logado --}}
                        <input type="hidden" value="{{ Auth::user()->id }}" name="id">

                        {{-- Botões : Registar ou Cancelar --}}
                        <div class="form-group">

                            <div class="col-sm-offset-4  float-right">
                                <a href="{{ route('dashboard') }}" name="cancelar" class="btn btn-danger">Cancelar</a>
                                <button type="submit" name="registrar" class="btn btn-success">Registrar</button>
                            </div>
                        </div>



                    </form>
                    <br>

                    {{-- Incluir membros ao projeto --}}
                    @include('adm.projects.addMembertoProject')

                    <br>




                </div> {{-- Card body --}}

            </div>{{-- Card --}}


        </div> {{-- row --}}


    </div> {{-- Container --}}

    @endsection




