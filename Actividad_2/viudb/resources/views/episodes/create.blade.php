@extends('layouts.app')
@section('content')

<h1>{{__('viudb.create_episode')}}</h1>

@include('layouts._errors')

@include('layouts._centered', [
        'width' => 'col-4',
        'include' => 'episodes._form',
        'route_path' => route('episodes.store'),
    'button_name'=>__('viudb.crear')
    ])

@endsection
