@extends('layouts.app')
@section('content')

{{-- <div class="col"> --}}
    <h1>{{__('viudb.create_language')}}</h1>
{{-- </div> --}}

@include('languages._form', [
    'route_path' => route('languages.store'),
    'button_name'=>__('viudb.crear')
    ])

@endsection
