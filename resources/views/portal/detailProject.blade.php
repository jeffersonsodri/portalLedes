@extends('layouts.portal')


@section('baseDoPortal')

<div class="container">
        <h1 style="margin-left: 1.0rem" class="titulo">{{ $project->name }}</h1>
        <hr style="background-color: #6937FF">

        <div class="row">
            <div class="" >
               <img src="{{ asset('image/imageProjects/'.$project->image)  }}"  alt="{{ $project->image }}"
               class="img-fluid float-left contorno-tbnail"   height="400" width="400" >
                @php
                echo $project->description;
                @endphp
            </div>
        </div>
</div>

@endsection
