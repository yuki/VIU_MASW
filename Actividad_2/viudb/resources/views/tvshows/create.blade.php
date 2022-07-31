@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.create_tvshow')}}</h1>

@include('layouts._errors')

@include('layouts._centered', [
    'width' => 'col-4',
    'include' => 'tvshows._form',
    'route_path' => route('tvshows.store'),
    'button_name'=>__('viudb.crear')
])

@endsection
