@extends('layouts.app')
@section('content')

<div class=" text-center ">
    <div class="col align-self-center  mb-5">
        @if (Storage::disk('public')->exists("img/platform_".$platform->id.".jpg"))

            <a class='imagen_grande' href="{{route('platforms.show',$platform)}}">
                <img class="plataforma" src="@php
                    echo Storage::disk('public')->url('img/platform_'.$platform->id.'.jpg')
                @endphp ">
            </a>
        @endif
    </div>

    <div class="col align-self-center mb-5">
        <h1>{{__('viudb.tvshows_from', ['platform' => $platform->name])}}
            <span class="botones">
                @include('platforms._buttons')
            </span>
        </h1>
    </div>
</div>

@include('tvshows._list', ['tvshows'=>$platform->tvshows,'paginate'=> false])

@endsection
