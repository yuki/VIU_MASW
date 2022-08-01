@extends('layouts.app')
@section('content')

<h1>{{__('viudb.edit_episode')}}</h1>

@include('layouts._errors')

@include('layouts._centered', [
    'width' => 'col-4',
    'include' => 'episodes._form',
    'route_path' => route('episodes.update',$episode),
    'button_name'=>__('viudb.edit')
])

@endsection
