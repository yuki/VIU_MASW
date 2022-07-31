@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.languages')}}</h1>

{{-- Formulario de búsqueda y botón de crear --}}
@include('layouts._search', ['route_path' => route('languages.create'),'button_name'=>__('viudb.create_language')])

@include('languages._list', ['languages'=>$languages,'paginate'=> true])

@endsection
