@extends('layouts.app')
@section('content')

<div class="col-10">
    <h1 class="titulo">{{__('viudb.create_tvshow')}}</h1>
</div>

@include('tvshows._form', [
    'route_path' => route('tvshows.store'),
    'button_name'=>__('viudb.crear')
    ])

@endsection
