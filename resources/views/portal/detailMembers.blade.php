@extends('layouts.portal')


@section('baseDoPortal')

    <div class="row" name="nome">
        <h1 class="titulo"> {{ $member->name }}<h1>
            {{-- <hr style="background-color: #6937FF"> --}}

        </div>
        <hr style="background-color: #6937FF">
    <div class="row"name="dados">
        <div class="col-md-3">
            <img class="float-right" height="200" width="200" src="{{asset('image/photos/'.$member->photo) }}" alt="{{ $member->name }}">
        </div>
        <div class="col-md-6">
            <ul>
                <li>
                    <h2>
                        {{ $member->email }}
                    </h2>
                </li>
                <li>
                    <h2>
                        {{ $member->course }}
                    </h2>
                </li>
            </ul>


        </div>
    </div>
    <hr class="titulo" style="background-color: #6937FF">
    <div class="row" name="sobre">
        <div class="col">
            <div>
                <h2>Sobre</h2>
            </div>
            <div>

                <h2>
                    @php
                        echo $member->description;
                    @endphp
                </h2>
            </div>
        </div>

    </div>
    <hr class="titulo" style="background-color: #6937FF">


    <div class="row" name="projetos">
        <div>
            <h2>Projetos</h2>
        </div>
    </div>


@endsection
