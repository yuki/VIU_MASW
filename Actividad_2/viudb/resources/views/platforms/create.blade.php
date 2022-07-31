@extends('layouts.app')
@section('content')

<h1>{{__('viudb.create_platform')}}</h1>

@include('layouts._errors')

@include('layouts._centered', [
        'width' => 'col-4',
        'include' => 'platforms._form',
        'route_path' => route('platforms.store'),
        'button_name'=>__('viudb.crear')
    ])

@endsection
