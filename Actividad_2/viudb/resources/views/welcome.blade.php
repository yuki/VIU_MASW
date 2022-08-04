@extends('layouts.app')

@section('content')

@if ($platforms)
    <div class="container">
        <h1>Plataformas populares</h1>
        <div class="text-center">
            @foreach ($platforms as $platform)
                <div class=" carrousel">
                    @if (Storage::disk('public')->exists("img/platform_".$platform->id.".jpg"))
                        <a href="{{route('platforms.show',$platform)}}">
                            <img class="plataforma" src="@php
                                echo Storage::disk('public')->url('img/platform_'.$platform->id.'.jpg')
                            @endphp ">
                        </a>
                    @endif
                </div>
            @endforeach

        </div>
    </div>
@else
    <h2>No hay plataformas</h2>
@endif


@guest
    <h2 class="text-center pt-5">{{__('viudb.must_be_logged')}}</h2>
@else

    @if ($platforms)
        <div class="container">
            <h1>Celebrities populares</h1>
            <div class="text-center">
                @foreach ($celebrities as $celebrity)
                    <div class=" carrousel">
                        @if (Storage::disk('public')->exists("img/celebrity_".$celebrity->id.".jpg"))
                            <a href="{{route('celebrities.show',$celebrity)}}">
                                <img class="carrousel_tvshow" src="@php
                                    echo Storage::disk('public')->url('img/celebrity_'.$celebrity->id.'.jpg')
                                @endphp ">
                            </a>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
    @else
        <h2>No hay celebrities</h2>
    @endif

    @if ($platforms)
        <div class="container">
            <h1>Quizá quieras ver...</h1>
            <div class="text-center">
                @foreach ($tvshows as $tvshow)
                    <div class=" carrousel">
                        @if (Storage::disk('public')->exists("img/tvshow_".$tvshow->id.".jpg"))
                            <a href="{{route('tvshows.show',$tvshow)}}">
                                <img class="carrousel_tvshow" src="@php
                                    echo Storage::disk('public')->url('img/tvshow_'.$tvshow->id.'.jpg')
                                @endphp ">
                            </a>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
    @else
        <h2>No hay series</h2>
    @endif

    @if ($platforms)
        <div class="container">
            <h1>¿Has visto estos episodios?</h1>
            <div class="text-center">
                @foreach ($episodes as $episode)
                    <div class=" carrousel">
                        @if (Storage::disk('public')->exists("img/episode_".$episode->id.".jpg"))
                            <a href="{{route('episodes.show',$episode)}}">
                                <img class="carrousel_tvshow" src="@php
                                    echo Storage::disk('public')->url('img/episode_'.$episode->id.'.jpg')
                                @endphp ">
                            </a>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
    @else
        <h2>No hay episodios</h2>
    @endif

@endguest




@endsection
