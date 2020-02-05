@extends('layouts.adm')

@section('baseAdm')

<div class="container ">
    <h3 class="titulo">PAINEL ADMINISTRATIVO</h3>
    <hr class="hr">
    <div class="row">

        <div class="col-sm-4">
            <a href="{{ route('tableNoticeGeneral') }}" type="button" class="card card-style contorno-btn">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Notícia')}}
                </div>
            </a>
        </div>

        @can('view', App\User::class)

        <div class=" col-sm-4">
            <a href="{{ route('tableMembers')}}" type="button" class="card card-style contorno-btn">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Membros')}}
                </div>
            </a>
        </div>
        <div class=" col-sm-4">
            <a href="{{ route('tableProjects')}}" type="button" class="card card-style contorno-btn">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Projetos')}}
                </div>
            </a>
        </div>

       <div class="col-sm-12">
           <hr class="hr">
       </div>

        <div class=" col-sm-4">
            <a href="{{ route('tableUsers')}}" type="button" class="card card-style contorno-btn">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Usuários')}}
                </div>
            </a>
        </div>



        <div class=" col-sm-4">
            <a href="#" type="button" class="card card-style contorno-btn">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Contato')}}
                </div>
            </a>
        </div>
        <div class=" col-sm-4">
            <a href="{{ route('editAboutUs', 1)}}" type="button" class="card card-style contorno-btn">
                <img src="image/icones/identidade.png" alt="id" class="icone">
                <div class="dash-text">
                    {{ __('Gerenciar Sobre Nós')}}
                </div>
            </a>
        </div>
        @endcan
    </div>{{-- Row --}}
</div> {{-- Container --}}


</div>
@endsection
