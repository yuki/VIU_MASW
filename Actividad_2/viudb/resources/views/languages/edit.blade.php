@extends('layouts.app')
@section('content')

<h1>{{__('viudb.edit_language')}}</h1>

@include('layouts._errors')

@include('layouts._centered', [
    'width' => 'col-4',
    'include' => 'languages._form',
    'route_path' => route('languages.update',$language),
    'button_name'=>__('viudb.edit')
])

@endsection
