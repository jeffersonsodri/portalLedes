@extends('layouts.portal')


@section('baseDoPortal')
<div style="border-radius:1.6rem; border: #6937FF 1px solid;">
    <div class="col justify-content-start">
        <h1 style="margin-left: 1.0rem" class="titulo">SOBRE NÓS</h1>
        <hr style="background-color: #6937FF">
    </div>
    @foreach ($aboutUs as $item)

    <img src="image/sobrenos/{{ $item->image }}" class="img-fluid rounded mx-auto d-block" style="padding: 15px;"  alt="Imagem LEDES" width="600" >

    <div class="col-md-12" style="padding: 15px;">
            @php
                    echo $item->description;
                    @endphp
            </div>
            @endforeach
</div>
@endsection
