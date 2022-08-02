@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.episodes')}}</h1>

{{-- Formulario de búsqueda y botón de crear --}}
@include('layouts._search', ['route_path' => route('episodes.create'),'button_name'=>__('viudb.create_episode')])

@include('episodes._list', ['episodes'=>$episodes, 'show_cover'=> true])

@endsection
