@extends('layouts.app')
@section('content')

<div class="col-10">
    <h1 class="titulo">{{__('viudb.edit_tvshow')}}</h1>
</div>

@include('tvshows._form', [
    'route_path' => route('tvshows.update',$tvshow),
    'button_name'=>__('viudb.edit')
    ])

@endsection
