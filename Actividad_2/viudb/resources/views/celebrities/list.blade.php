@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.celebrities')}}</h1>

{{-- Formulario de búsqueda y botón de crear --}}
@include('layouts._search', ['route_path' => route('celebrities.create'),'button_name'=>__('viudb.create_celebrity')])

@include('celebrities._list', ['celebrities'=>$celebrities,'paginate'=>true])

@endsection
