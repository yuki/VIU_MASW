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
                        {{-- TODO: cambiar --}}
                        <a class="btn btn-outline-warning btn-sm" href="{{route('tvshows.edit',$tvshow)}}" role="button">{{__('viudb.edit')}}</a>
                        <a class="btn btn-outline-danger btn-sm"
                            onclick="getDependencies(<?php echo $tvshow->id ?> ,
                                              'tvshows',
                                              'tvshow',
                                              'apariciones'
                                              )"
                            role="button">{{__('viudb.delete')}}</a>
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
