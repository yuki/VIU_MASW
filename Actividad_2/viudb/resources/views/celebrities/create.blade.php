@extends('layouts.app')
@section('content')

<div class="col-10">
    <h1>{{__('viudb.create_celebrity')}}</h1>
</div>

@include('celebrities._form', [
    'route_path' => route('celebrities.store'),
    'button_name'=>__('viudb.crear')
    ])

@endsection
