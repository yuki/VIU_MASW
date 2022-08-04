@extends('layouts.app')

@section('content')

@if (count($platforms)>0)
    <div class="container">
        <h1>{{__('viudb.popular_platforms')}}</h1>
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
    <h2 class="text-center pb-5">{{__('viudb.no_platforms')}}</h2>
@endif


@guest
    <h2 class="text-center pb-5">{{__('viudb.must_be_logged')}}</h2>
@else

    @if (count($platforms)>0)
        <div class="container">
            <h1>{{__('viudb.popular_celebrities')}}</h1>
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
        <h2 class="text-center pb-5">{{__('viudb.no_celebrities')}}</h2>
    @endif

    @if (count($platforms)>0)
        <div class="container">
            <h1>{{__('viudb.want_to_see')}}</h1>
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
        <h2 class="text-center pb-5">{{__('viudb.no_tvshows')}}</h2>
    @endif

    @if (count($platforms)>0)
        <div class="container">
            <h1>{{__('viudb.have_seen_episodes')}}</h1>
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
        <h2 class="text-center pb-5">{{__('viudb.no_episodes')}}</h2>
    @endif

@endguest




@endsection
