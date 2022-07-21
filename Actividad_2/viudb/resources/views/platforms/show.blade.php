@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4">
                @if (Storage::disk('public')->exists("img/platform_".$platform->id.".jpg"))

                    <a class='imagen_grande' href="{{route('platforms.show',$platform)}}">
                        <img class="plataforma_img" src="@php
                            echo Storage::disk('public')->url('img/platform_'.$platform->id.'.jpg')
                        @endphp ">
                    </a>
                @endif
            </div>
            <div class="col align-self-center">
                <h1>{{__('viudb.tvshows_from', ['platform' => $platform->name])}}
                    <span class="botones">
                        {{-- TODO: cambiar --}}
                        <a class="btn btn-outline-warning btn-sm" href="/views/celebrities/edit.php?id=<?php echo $platform->id ?>" role="button">Editar</a>
                        <a class="btn btn-outline-danger btn-sm"
                            onclick="getDependencies(<?php echo $platform->id ?> ,
                                              'celebrities',
                                              'celebrity',
                                              'apariciones'
                                              )"
                            role="button">Borrar</a>
                    </span>
                </h1>
            </div>
  </div>

@endsection
