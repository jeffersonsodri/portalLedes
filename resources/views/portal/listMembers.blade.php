@extends('layouts.portal')

@section('baseDoPortal')

        <h1 class="titulo">MEMBROS</h1>
        <hr style="background-color: #6937FF">


        <div class="row">

            @foreach ($members as $item)
                <div class="col-lg-3">
                    <a href="{{route('detailMember', $item->id)}}">
                        <div class="card card-description">
                            <img src="image/photos/{{ $item->photo}}" alt="{{ $item->photo }}" class="card-img-top card-img" />
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $item->name}}
                                </p>
                                <h5 class="card-title">
                                    {{ $item->course }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>


@endsection
