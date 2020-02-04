@extends('layouts.portal')


@section('baseDoPortal')

<div class="container">
        <h1 style="margin-left: 1.0rem" class="titulo">{{ $notice->titulo }}</h1>
        <hr style="background-color: #6937FF">
            <div style="margin-left:15px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                <strong>
                    {{ $notice->author }}, {{ $notice->updated_at->format(' \  \ \ d/m/Y \à\s H:i:s') }}
                </strong>        
                <div class="float-right" style="margin-right:10px;" >
                        <img src="{{ asset('image/icones/twitter.png') }}" alt="Twitter Ledes" height="35" width="35">
                        <a href="https://www.facebook.com/ledesufms/">
                            <img src="{{ asset('image/icones/facebook.png') }}" alt="Facebook Ledes" height="35" width="35">
                        </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="" style="width:100%;">
                    <img src="{{ asset('image/imageNotices/'.$notice->image)  }}"  alt="{{ $notice->image }}" 
                    class="img-fluid contorno-tbnail float-left" height="400" width="400" style="display:inline-block; margin-right:15px;" >
                    @php
                    echo $notice->description;
                    @endphp
                </div>
            </div>
    </div>
    <br><br>
    
        <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:22px;"><strong>Veja também:</strong></p>
        <div>
        <div class="row">

            @foreach ($arrayNotice as $item)
            <div class="col thumbnail-mini" style="margin-right:80px; margin-top:26px; margin-left:5px;">
                <a href="{{ route('detailsNoticeGeneral', $item->id) }}" >
                    <img  class="thumbnail-mini card-img-top mx-auto d-block" src="{{ asset("/image/imageNotices/" . $item->image) }}" alt="{{ $item->title }}">
                    <div class="card-body">
                        <h5 class="card-titletle" style="color:black; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" for="{{ $item->title }}">{{ $item->title }}</h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>



</div>


@endsection
