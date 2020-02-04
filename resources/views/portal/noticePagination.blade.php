@extends('layouts.portal')

@section('baseDoPortal')

    <ul class="list-group list-group-horizontal-md">
        <li class="list-group-item"><a href="{{ route('home') }}">Home →</a></li>
        <li class="list-group-item"><a href="{{ route('noticePagination') }}">Notícias →</a></li>
        <li class="list-group-item"><a href="{{ route('noticePagination') }}">
            @if (empty($page) )
            1
            @else
            {{ __('$page')}}
            @endif
            </a></li>
      </ul><br>


    <div style="border-radius:1.6rem; border: #6937FF 1px solid;">

        <div class="col justify-content-start">
            <h1 style="margin-left: 1.0rem" class="titulo">NOTÍCIAS</h1>
            <hr class="hr">
        </div>
        
        @foreach ($notices as $notice)
        <div class="row">
            <a href="{{ route('detailsNoticeGeneral', $notice->id) }}">
                <img style="margin-left: 30px;" class="thumbnail-mini" src="{{ asset("/image/imageNotices/" . $notice->image) }}" alt="{{ $notice->title }}">
            </a>
            <div class="col-sm-8 size-notice-text descricao-curta">
                    <div class="titulo-noticia-pequena">
                    {{ $notice->title }}
                </div>
                @php
                    echo $notice->description
                @endphp
            </div>

        </div> {{-- Row --}}
        <br>

        @endforeach

        <div class="row">
            <div class="col"></div>
                {!! $notices->links() !!}
            <div class="col"></div>
        </div>


    </div>
@endsection
