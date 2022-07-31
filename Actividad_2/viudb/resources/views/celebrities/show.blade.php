@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4 text-center">
                @if (Storage::disk('public')->exists("img/celebrity_".$celebrity->id.".jpg"))

                    <a href="{{route('celebrities.show',$celebrity)}}">
                        <img class="show" src="@php
                            echo Storage::disk('public')->url('img/celebrity_'.$celebrity->id.'.jpg')
                        @endphp ">
                    </a>
                @endif
            </div>
            <div class="col align-self-center">
                <h1 class="show">{{ $celebrity->name }} {{ $celebrity->surname }}
                    <span class="botones">
                        {{-- TODO: cambiar --}}
                        <a class="btn btn-outline-warning btn-sm" href="{{route('celebrities.edit',$celebrity)}}" role="button">{{__('viudb.edit')}}</a>
                        <a class="btn btn-outline-danger btn-sm"
                            onclick="getDependencies(<?php echo $celebrity->id ?> ,
                                              'celebrities',
                                              'celebrity',
                                              'apariciones'
                                              )"
                            role="button">{{__('viudb.delete')}}</a>
                    </span>
                </h1>
                <div class="info">
                    <p>{{__('viudb.born')}} {{$celebrity->fecha()}}</p>
                    <p>{{__('viudb.nation')}} {{$celebrity->nation}}</p>
                    <p>{{__('viudb.ficha')}} <a href="{{$celebrity->url}}">IMDB</a></p>
                </div>
            </div>
  </div>

@endsection
