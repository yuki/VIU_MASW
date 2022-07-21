@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.celebrities')}}</h1>
<p class="botones mb-4"><span ><a class="btn btn-outline-primary" href="{{route('celebrities.create')}}" role="button">{{__('viudb.create_celebrity')}}</a></span></p>

@if (count($celebrities)> 0)
    <table class="offset-2 col-8 text-center">
        <thead>
            <tr>
                <th></th>
                <th>{{__('viudb.name_surname')}}</th>
                <th>{{__('viudb.born')}}</th>
                <th>{{__('viudb.nation')}}</th>
                <th>{{__('viudb.url')}}</th>
                <th>{{__('viudb.actions')}}</th>
            </tr>
        </thead>
        @foreach ($celebrities as $celebrity)
            <tr>
                <td class="col-2">
                    @if (Storage::disk('public')->exists("img/celebrity_".$celebrity->id.".jpg"))
                        <a href="{{route('celebrities.show',$celebrity)}}">
                            <img class="celebrity" src="@php
                                echo Storage::disk('public')->url('img/celebrity_'.$celebrity->id.'.jpg')
                            @endphp ">
                        </a>
                    @endif
                </td>
                <td class="text-start"><a href="{{route('celebrities.show',$celebrity)}}">{{$celebrity->name}} {{$celebrity->surname}}</a></td>
                <td class="text-start">{{$celebrity->born}}</td>
                <td class="text-start">{{$celebrity->nation}}</td>
                <td class="text-start"><a href="{{$celebrity->url}}">IMDB</a></td>
                <td>
                    <a class="btn btn-outline-warning" href="{{route('celebrities.edit',$celebrity)}}" role="button">{{__('viudb.edit')}}</a>
                    <a class="btn btn-outline-danger"
                    {{-- TODO: cambiar --}}
                      onclick="getDependencies(,
                                              'celebrities',
                                              'plataforma',
                                              'series'
                                              )"
                      role="button">{{__('viudb.delete')}}</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="paginate d-flex justify-content-center">
        {{ $celebrities->links() }}
    </div>

@else

    <div class="alert alert-warning mt-3 text-center">
        <strong>{{__('viudb.no_celebrities')}}</strong>
    </div>
@endif

@endsection
