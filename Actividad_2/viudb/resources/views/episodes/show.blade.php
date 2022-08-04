@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            @if (Storage::disk('public')->exists("img/episode_".$episode->id.".jpg"))
                <div class="col-4 text-center">

                    <a href="{{route('episodes.show',$episode)}}">
                        <img class="show" src="@php
                            echo Storage::disk('public')->url('img/episode_'.$episode->id.'.jpg')
                        @endphp ">
                    </a>

                </div>
            @endif
            <div class="col align-self-center">
                <h1 class='show
                    {{-- text-center si no hay imagen --}}
                    @if (!Storage::disk("public")->exists("img/episode_".$episode->id.".jpg"))
                        text-center
                    @endif
                '>{{ $episode->name }}
                    <span class="botones">
                        @include('episodes._buttons')
                    </span>
                </h1>
                <div class="info">
                    <p>{{$episode->sinopsis}}</p>
                    <p>{{__('viudb.released')}}: {{$episode->fecha()}}</p>
                </div>
            </div>

        </div>

        <div class="">
            <h2 class="pt-5 pb-5 text-center">
                {{__('viudb.episode_languages')}}
                <a class="btn btn-outline-primary" role="button" onclick="languageModal()">{{__('viudb.add_languages')}}</a>
            </h2>
            @include('languages._list', ['languages'=>$languages])
        </div>

        <div class="">
            <h2 class="pt-5 pb-5 text-center">
                {{__('viudb.episode_celebrities')}}
                <a class="btn btn-outline-primary" role="button"
                    onclick="FilmographyModal()">{{__('viudb.add_celebrities')}}</a>
            </h2>
            @include('celebrities._list', ['celebrities'=>$celebrities])
        </div>
    </div>

    @include('layouts._episodes_celebrities_modal',['all_celebrities' => $all_celebrities,'performances'=>$performances])
    @include('layouts._episodes_languages_modal',['types' => $types,'performances'=>$performances])

@endsection
