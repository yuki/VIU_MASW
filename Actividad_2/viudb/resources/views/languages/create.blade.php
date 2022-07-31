@extends('layouts.app')
@section('content')

<h1>{{__('viudb.create_language')}}</h1>

@include('layouts._errors')

@include('layouts._centered', [
        'width' => 'col-2',
        'include' => 'languages._form',
        'route_path' => route('languages.store'),
        'button_name'=>__('viudb.crear')
    ])

@endsection
