@extends('layouts.app')
@section('content')

<h1 class="titulo">{{__('viudb.platforms')}}</h1>

<div class="row pb-3">
    @include('layouts._search')  {{-- Formulario de búsqueda --}}
    <div class="col text-center align-self-center">
        <a class="btn btn-outline-primary" href="{{route('platforms.create')}}" role="button">{{__('viudb.create_platform')}}</a>
    </div>
</div>


@if (count($platforms)> 0)
    <table class="offset-2 col-8 text-center">
        @foreach ($platforms as $platform)
            <tr>
                <td>
                    @if (Storage::disk('public')->exists("img/platform_".$platform->id.".jpg"))
                        <a href="{{route('platforms.show',$platform)}}">
                            <img class="plataforma" src="@php
                                echo Storage::disk('public')->url('img/platform_'.$platform->id.'.jpg')
                            @endphp ">
                        </a>
                    @endif
                </td>
                <td class="text-start"><a href="{{route('platforms.show',$platform)}}">{{$platform->name}}</a></td>
                <td>
                    <a class="btn btn-outline-success" href="{{route('tvshows.create')}}" role="button">{{__('viudb.create_tvshow')}}</a>
                    <a class="btn btn-outline-warning" href="{{route('platforms.edit',$platform)}}" role="button">{{__('viudb.edit')}}</a>
                    <a class="btn btn-outline-danger"
                    {{-- TODO: cambiar --}}
                      onclick="getDependencies(,
                                              'platforms',
                                              'plataforma',
                                              'series'
                                              )"
                      role="button">{{__('viudb.delete')}}</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="paginate d-flex justify-content-center">
        {{ $platforms->links() }}
    </div>

@else
    <div class="alert alert-warning mt-3 text-center">
        <strong>{{__('viudb.no_platforms')}}</strong>
    </div>
@endif

@endsection
