@extends('layouts.adm')

@section('baseAdm')

<div class="container ">
    <h3 class="titulo">PAINEL ADMINISTRATIVO</h3>
    <hr class="hr">
    <div class="row">

        <div class="contorno-btn col-sm-3" style="margin-left: 80px">
            <a href="{{ route('tableNoticeGeneral') }}" type="button" class="card card-style">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Notícia')}}
                </div>
            </a>
        </div>

        @can('view', App\User::class)

        <div class="contorno-btn col-sm-3" style="margin-left: 80px">
            <a href="{{ route('tableMembers')}}" type="button" class="card card-style">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Membros')}}
                </div>
            </a>
        </div>
        <div class="contorno-btn col-sm-3" style="margin-left: 80px">
            <a href="{{ route('tableProjects')}}" type="button" class="card card-style">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Projetos')}}
                </div>
            </a>
        </div>
        <div class="contorno-btn col-sm-3" style="margin-left: 80px">
            <a href="{{ route('tableUsers')}}" type="button" class="card card-style">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Usuários')}}
                </div>
            </a>
        </div>



        <div class="contorno-btn col-sm-3" style="margin-left: 80px">
            <a href="#" type="button" class="card card-style">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Contato')}}
                </div>
            </a>
        </div>
        <div class="contorno-btn col-sm-3" style="margin-left: 80px">
            <a href="{{ route('editAboutUs', 1)}}" type="button" class="card card-style">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Sobre Nós')}}
                </div>
            </a>
        </div>
        @endcan
    </div>
</div> {{-- Row --}}
</div> {{-- Container --}}


</div>
@endsection
