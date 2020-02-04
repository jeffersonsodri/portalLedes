@extends('layouts.portal')

@section('baseDoPortal')


        <div class="col justify-content-start">
            <h1 style="margin-left: 1.0rem" class="titulo">MEMBROS</h1>
            <hr style="background-color: #6937FF">
        </div>
        <div class="row justify-content-start">
            
            <div class="card-distance">
                <ul>
                    @foreach ($members as $item)
                    <li>
                        <a href="#">
                            <img src="image/photos/{{ $item->photo}}" alt="{{ $item->photo }}"/>
                            <p>{{ $item->name}} <br>
                                {{ $item->course }}</p>
                      
                        </a>
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>
    
@endsection
