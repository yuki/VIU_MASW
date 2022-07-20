@extends('layouts.app')
@section('content')

<div class="col-10">
    <h1>{{__('viudb.edit_platform')}}</h1>
</div>

@include('platforms._form', [
    'route_path' => route('platforms.update',$platform),
    'button_name'=>__('viudb.edit')
    ])

@endsection
