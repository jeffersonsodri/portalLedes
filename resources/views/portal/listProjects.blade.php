@extends('layouts.portal')

@section('baseDoPortal')
        <div class="col justify-content-start">
            <h1 style="margin-left: 1.0rem" class="titulo">PROJETOS</h1>
            <hr class="hr">
        </div>
        <div class="row justify-content-start">

            <div class="card-distance ">
                <ul>
                    @foreach ($projects as $item)
                        <li>
                            <a href="{{ route('detailProject', $item->id) }}" type="button" >
                                <img src="{{ asset('image/imageProjects/' . $item->image) }}"  class="card-img-top card-img" alt="{{ $item->image }}">
                                <p>{{ $item->name}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

@endsection
