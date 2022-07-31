@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.tvshows')}}</h1>

<div class="row pb-3">
    @include('layouts._search')  {{-- Formulario de búsqueda --}}
    <div class="col text-center align-self-center">
        <a class="btn btn-outline-primary" href="{{route('tvshows.create')}}" role="button">{{__('viudb.create_tvshow')}}</a>
    </div>
</div>

@include('tvshows._list', ['tvshows'=>$tvshows,'paginate'=> true])

@endsection
