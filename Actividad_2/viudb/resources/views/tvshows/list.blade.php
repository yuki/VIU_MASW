@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.tvshows')}}</h1>

{{-- Formulario de búsqueda y botón de crear --}}
@include('layouts._search', ['route_path' => route('tvshows.create'),'button_name'=>__('viudb.create_tvshow')])

@include('tvshows._list', ['tvshows'=>$tvshows,'paginate'=> true])

@endsection
