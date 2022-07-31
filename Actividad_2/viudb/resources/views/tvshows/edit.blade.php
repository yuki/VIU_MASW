@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.edit_tvshow')}}</h1>

@include('layouts._errors')

@include('layouts._centered', [
    'width' => 'col-4',
    'include' => 'tvshows._form',
    'route_path' => route('tvshows.update',$tvshow),
    'button_name'=>__('viudb.edit')
])

@endsection
