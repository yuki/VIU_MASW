@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.tvshows')}}</h1>
<p class="botones"><span ><a class="btn btn-outline-primary" href="{{route('tvshows.create')}}" role="button">{{__('viudb.create_tvshow')}}</a></span></p>

@include('tvshows._list', ['tvshows'=>$tvshows,'paginate'=> true])

@endsection
