@extends('layouts.app')
@section('content')

<div class="col-10">
    <h1>{{__('viudb.create_platform')}}</h1>
</div>

@include('platforms._form', [
    'route_path' => route('platforms.store'),
    'button_name'=>__('viudb.crear')
    ])

@endsection
