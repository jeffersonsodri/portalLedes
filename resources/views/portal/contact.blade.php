@extends('layouts.portal')


@section('baseDoPortal')
<div style="border-radius:1.6rem; border: #6937FF 1px solid;">

<div class="container">
        <div class="col justify-content-start">
            <h1 style="margin-left: 1.0rem" class="titulo">CONTATO</h1>
            <hr style="background-color: #6937FF">
        </div>

        {{-- Telefone --}}
        <div class="row div-contato">
            <div class="col-sm-1">
                <img src="image/icones/telefone.png" alt="telefone" class="img-fluid rounded">
            </div>
            <div class="col-sm-8">
                <div class="col">Telefone</div>
                <div class="col">(67) 3345-7532</div>

            </div>
        </div>


        {{-- Endereço Mapa --}}
        <div class="row div-contato">
            <div class="col-sm-1">
                <img src="image/icones/mapa.png" alt="mapa" class="img-fluid rounded">
            </div>
            <div class="col-sm-8 ">
                    <div class="col">Endereço</div>
                    <div class="col">Cidade Universitária, caixa postal 549, CEP:79070-900. Campo Grande MS</div>
            </div>
        </div>

        {{-- E-mail --}}
        <div class="row div-contato">
            <div class="col-sm-1">
                <img src="image/icones/email.png" class="img-fluid rounded" alt="endereço">
            </div>
            <div class="col-sm-8 ">
                    <div class="col">E-mail</div>
                    <div class="col">ledesfacomufms@gmail.com</div>
            </div>
        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3737.0923520021247!2d-54.61556668490142!3d-20.502440061659215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9486e5f512dc28e9%3A0x6d7d288192cb4db3!2sLaborat%C3%B3rio+de+Engenharia+de+Software+-+LEDES!5e0!3m2!1spt-BR!2sbr!4v1493915610320"
            width="100%" height="490" frameborder="0" style="border:0" allowfullscreen="" class="contorno-btn" style="margin-top:5rem;" ></iframe>

</div> {{--  Container --}}

</div>


@endsection
