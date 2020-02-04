@extends('layouts.portal')



@section('baseDoPortal')


<div class="relative">
        <div class="col contorno-carosel" >
            <div id="slide" class="carousel slide carousel-fade contorno-tbnail " data-ride="carousel" data-interval="7000" data-pause="hover">
                <ol class="carousel-indicators indicators-thumbnail">
                    <li data-target="#slide" data-slide-to="0" class="active"></li>
                    <li data-target="#slide" data-slide-to="1"></li>
                    <li data-target="#slide" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner img-noticia " >
                        {{-- {{ dd($notices) }} --}}
                        @if ($notices[0] != '')
                            <a type="button" href="{{ route('detailsNoticeGeneral', $notices[0]->id) }}" class="carousel-item active">
                                <img class="thumbnail" src="{{ asset("/image/imageNotices/" . $notices[0]->image) }}" alt="{{ $notices[0]->title }}">
                            </a>
                            @for ($i = 1; $i < $tamanho && $i < 3; $i++)
                            <a type="button" href="{{ route('detailsNoticeGeneral', $notices[$i]->id) }}" class="carousel-item" >
                                <img class="thumbnail" src="{{ asset("/image/imageNotices/" . $notices[$i]->image) }}" alt="{{ $notices[$i]->title }}">
                            </a>
                        @endfor
                        @else
                            <div class="carousel-item active" >
                                <img class="thumbnail"  alt="Não Possui Notícia!">
                            </div>
                        @endif

                </div>
                <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
                    <img src="{{ asset('image/icones/esquerda.png') }}" alt="Anterior" aria-hidden="true" height="40" width="40" >
                </a>
                <a class="carousel-control-next" href="#slide" role="button" data-slide="next">
                    <img src="{{ asset('image/icones/direita.png') }}" alt="Proximo" aria-hidden="true" height="40" width="40">
                </a>
            </div>
        </div> {{-- Row do carosel --}}
</div>


    <hr style="background-color: #6937FF">
    <br><br>
    <div>
            @foreach ($notices as $notice)
            <div class="row">
                <a href="{{ route('detailsNoticeGeneral', $notice->id) }}">
                    <img class="thumbnail-mini" src="{{ asset("/image/imageNotices/" . $notice->image) }}" alt="{{ $notice->title }}">
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

        </div>


    <br><br>

    <div class="row">
        <div class="col"></div>
        <a href="{{ route('noticePagination') }}" type="button" class="btn btn-primary contorno-btn">Ver mais</a>
        <div class="col"></div>
    </div>

@endsection
