@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4 text-center">
                @if (Storage::disk('public')->exists("img/tvshow_".$tvshow->id.".jpg"))

                    <a href="{{route('tvshows.show',$tvshow)}}">
                        <img class="show" src="@php
                            echo Storage::disk('public')->url('img/tvshow_'.$tvshow->id.'.jpg')
                        @endphp ">
                    </a>
                @endif
            </div>
            <div class="col align-self-center">
                <h1 class="show">{{ $tvshow->name }} {{ $tvshow->surname }}
                    <span class="botones">
                        @include('tvshows._buttons')
                    </span>
                </h1>
                <div class="info">
                    <p>{{$tvshow->sinopsis}}</p>
                    <p>{{__('viudb.ficha')}} <a href="{{$tvshow->url}}">IMDB</a></p>
                </div>
            </div>
        </div>
        <div class="">
            <h2 class="pt-3 pb-3 text-center">{{__('viudb.tvshows_episodes')}}</h2>
            @include('episodes._list', ['episodes'=>$episodes, 'paginate'=>false])
        </div>
  </div>

@endsection
