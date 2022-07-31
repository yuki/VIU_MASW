@extends('layouts.app')
@section('content')

<h1>{{__('viudb.create_celebrity')}}</h1>

@include('layouts._errors')

@include('layouts._centered', [
        'width' => 'col-4',
        'include' => 'celebrities._form',
        'route_path' => route('celebrities.store'),
    'button_name'=>__('viudb.crear')
    ])

@endsection
