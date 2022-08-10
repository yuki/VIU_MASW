@extends('layouts.app')

@section('content')

<h1>Búsqueda</h1>

<div class="container">
    <div class="row justify-content-center">
        <form  name="search" action="{{route('controller.search')}}" method="POST" class="col-5">
            @csrf
            <input class="form-control" name="name"  type="search" placeholder="Search" aria-label="Search" value="{{$name}}">
        </form>
    </div>
</div>

<div class="container">
    <h1>Resultados de '{{$name}}'</h1>
    <div class="row justify-content-center">
        <ul class="col-5">
            @if (count($platforms)>0)
                <li>{{__('viudb.platforms')}}</li>
                <ul>
                    @foreach ($platforms as $platform)
                        <li><a href="{{route('platforms.show',$platform)}}">{!!searched($platform->name,$name)!!}</a></li>
                    @endforeach
                </ul>
            @endif
            @if (count($tvshows)>0)
                <li>{{__('viudb.tvshows')}}</li>
                <ul>
                    @foreach ($tvshows as $tvshow)
                        <li><a href="{{route('tvshows.show',$tvshow)}}">{!!searched($tvshow->name,$name)!!}</a>: <span> {!!searched($tvshow->sinopsis,$name)!!}</span></li>
                    @endforeach
                </ul>
            @endif
            @if (count($episodes)>0)
                <li>{{__('viudb.episodes')}}</li>
                <ul>
                    @foreach ($episodes as $episode)
                        <li><a href="{{route('episodes.show',$episode)}}">{!!searched($episode->name,$name)!!}</a>: <span>{!!searched($episode->sinopsis,$name)!!}</span></li>
                    @endforeach
                </ul>
            @endif
            @if (count($celebrities)>0)
                <li>{{__('viudb.celebrities')}}</li>
                <ul>
                    @foreach ($celebrities as $celebrity)
                        <li><a href="{{route('celebrities.show',$celebrity)}}">{!!searched($celebrity->name,$name)!!} {!!searched($celebrity->surname,$name)!!}</a></li>
                    @endforeach
                </ul>
            @endif
            @if (count($languages)>0)
                <li>{{__('viudb.languages')}}</li>
                <ul>
                    @foreach ($languages as $language)
                        <li>
                            <a href="{{route('languages.show',$language)}}">{!!searched($language->name,$name)!!}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </ul>
    </div>
</div>
@endsection
