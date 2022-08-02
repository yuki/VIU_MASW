@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4 text-center">
                @if (Storage::disk('public')->exists("img/episode_".$episode->id.".jpg"))
                    <a href="{{route('episodes.show',$episode)}}">
                        <img class="show" src="@php
                            echo Storage::disk('public')->url('img/episode_'.$episode->id.'.jpg')
                        @endphp ">
                    </a>
                @endif
            </div>
            <div class="col align-self-center">
                <h1 class="show">{{ $episode->name }}
                    <span class="botones">
                        @include('episodes._buttons')
                    </span>
                </h1>
                <div class="info">
                    <p>{{$episode->sinopsis}}</p>
                </div>
            </div>

        </div>

        <div class="">
            <h2 class="pt-5 pb-5 text-center">{{__('viudb.episode_languages')}}</h2>
            @include('languages._list', ['languages'=>$languages])
        </div>

        <div class="">
            <h2 class="pt-5 pb-5 text-center">{{__('viudb.episode_celebrities')}}</h2>
            @include('celebrities._list', ['celebrities'=>$celebrities])
        </div>
  </div>

@endsection
