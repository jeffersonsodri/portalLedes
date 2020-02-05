@extends('layouts.portal')

@section('baseDoPortal')
        <h1 style="margin-left: 1.0rem" class="titulo">PROJETOS</h1>
        <hr class="hr">
        <div class="row">

            @foreach ($projects as $item)
                <div class="col-lg-3">
                    <a href="{{ route('detailProject', $item->id) }}" type="button" >
                        <div class="card card-description">
                            <img src="{{ asset('image/imageProjects/' . $item->image) }}"  class="card-img-top card-img" alt="{{ $item->image }}">
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $item->name}}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

@endsection
