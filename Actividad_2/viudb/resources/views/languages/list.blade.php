@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.languages')}}</h1>

<div class="row pb-3">
    @include('layouts._search')  {{-- Formulario de búsqueda --}}
    <div class="col text-center align-self-center">
        <a class="btn btn-outline-primary" href="{{route('languages.create')}}" role="button">{{__('viudb.create_language')}}</a>
    </div>
</div>

@include('languages._list', ['languages'=>$languages,'paginate'=> true])

@endsection
