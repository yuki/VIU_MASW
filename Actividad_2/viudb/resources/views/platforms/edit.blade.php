@extends('layouts.app')
@section('content')

<h1>{{__('viudb.edit_platform')}}</h1>

@include('layouts._errors')

@include('layouts._centered', [
        'width' => 'col-4',
        'include' => 'platforms._form',
        'route_path' => route('platforms.update',$platform),
        'button_name'=>__('viudb.edit')
    ])

@endsection
