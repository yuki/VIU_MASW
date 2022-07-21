@extends('layouts.app')
@section('content')

<div class="col-10">
    <h1>{{__('viudb.edit_celebrity')}}</h1>
</div>

@include('celebrities._form', [
    'route_path' => route('celebrities.update',$celebrity),
    'button_name'=>__('viudb.edit')
    ])

@endsection
