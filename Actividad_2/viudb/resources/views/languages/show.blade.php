@extends('layouts.app')
@section('content')

    <div class="container">
        <h1 class="show text-center">{{ $language->name }}
            <span class="botones">
                {{-- @include('$languages._buttons') --}}
            </span>
        </h1>
        <div class="">
            <h2 class="pt-3 pb-3 text-center">{{__('viudb.languages_episodes')}}</h2>
            @include('episodes._list', ['episodes'=>$episodes, 'language'=>$language,'paginate'=>false, 'show_cover'=> false])
        </div>
  </div>

@endsection
