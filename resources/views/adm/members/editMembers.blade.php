@extends('layouts.adm')

@section('baseAdm')

<div class="container">
    <h3 class="card-title  titulo">EDITAR MEMBRO</h3>
    <hr style="background-color: #6937FF">
    <div class="row">
            <div class="card col-md-12 contorno-btn">
                <div class="card-body">

                    <form class="form-horizontal" method="post" action="{{ route('updateMembers', $member->id) }}" enctype="multipart/form-data">
                         @csrf
                        <input type="hidden" name="_method" value="put">


                        {{-- Campo: Nome Completo --}}
                         <div class="form-group row">
                            <label class="control-label col-sm-4 text-sm-right" for="name">Nome completo:</label>
                            <div class="col-sm-6">
                                <input required value="{{ $people->name }}" type="text" class="form-control" name="name" id="name" placeholder="Nome Completo">
                            </div>
                        </div>

                         {{-- Campo: Email --}}
                        <div class="form-group row">
                            <label class="control-label col-sm-4 text-sm-right" for="email">Email:</label>
                            <div class="col-sm-6">
                                <input required type="email" value="{{ $people->email }}" class="form-control" name="email" id="email" placeholder="Coloque email">
                            </div>
                            <div class="col-sm-2"></div>
                        </div>

                        {{-- Campo: Curso --}}
                        <div class="form-group row">
                            <label class="control-label col-sm-4 text-sm-right" for="course">Curso:</label>
                            <div class="col-sm-6">
                                <select name="course" class="form-control" required>
                                    <option selected value="{{ $member->course }}" class="text-default">{{ __($member->course) }}</option>
                                    <option value="Engenharia de Software">Engenharia de Software</option>
                                    <option value="Engenharia da Computação">Engenharia da Computação</option>
                                    <option value="Ciência da computação">Ciência da computação</option>
                                    <option value="Sistemas de Informação">Sistemas de Informação</option>
                                    <option value="Tec. em Análise e Desenvolvimento de Sistemas">Tec. em Análise e Desenvolvimento de Sistemas</option>
                                    <option value="Tec. Redes de Computadores">Tec. Redes de Computadores</option>
                                </select>
                            </div>
                        </div>

                        {{-- Escolha entre o office --}}
                        <div class="form-group row">
                            <label class="control-label col-sm-4 text-sm-right" for="office" >Cargo:</label>
                                <div class="col-sm-6">
                                    <select name="office" class="form-control"  required>
                                        <option value="estagiario" @if ($office == 'Estagiario') selected @endif >Estagiário</option>
                                        <option value="bolsista" @if ($office == 'Bolsista') selected @endif >Bolsista</option>
                                        <option value="professor" @if ($office == 'Professor') selected @endif >Professor</option>

                                    </select>
                                </div>
                                <div class="col-sm-2">

                                </div>
                        </div>

                        {{-- Campo: Descricao --}}
                        <div class="form-group row">
                            <label for="descricao" class="control-label col-sm-3 text-sm-right">Descrição:</label>
                            <div class="col-sm-8">
                                <textarea id="summernote" class="form-control col-sm-10" id="descricao" name="descricao" rows="3">{{ $member->description }}</textarea>
                            </div>
                        </div>

                        {{-- Campo: Upload Imagem --}}
                        <div class="input-group input-group-sm mb-3 row">
                            <label class="control-label col-sm-4 text-sm-right" for="foto" >Foto:</label>
                            <div class="custom-file col-sm-3">
                                <input type="file" class="custom-file-input" id="customFile" name="photo" id="image">
                                <label class="custom-file-label text-sm-left" for="customFile">{{ $member->photo }}</label>
                            </div>
                        </div>

                        {{-- Botões : Registar ou Cancelar --}}
                        <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-offset-2 col-sm-8">
                            <a href="{{ route('dashboard') }}" name="cancelar" class="btn btn-danger">Cancelar</a>
                            <button type="submit" name="registrar" class="btn btn-success">Editar Membro</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
