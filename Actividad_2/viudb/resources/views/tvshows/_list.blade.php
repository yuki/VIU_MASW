@if (count($tvshows)> 0)
    <table class="col">
        @foreach ($tvshows as $tvshow)
            <tr>
                <td class="col-3 text-center">

                    @if (Storage::disk('public')->exists("img/tvshow_".$tvshow->id.".jpg"))
                        <a href="{{route('tvshows.show',$tvshow)}}">
                            <img class="tvshow" src="@php
                                echo Storage::disk('public')->url('img/tvshow_'.$tvshow->id.'.jpg')
                            @endphp ">
                        </a>
                    @endif

                </td>
                <td class="text-start col-5">
                    <a class="tvshow_name" href="{{route('tvshows.show',$tvshow)}}">{{$tvshow->name}}</a><br>
                    <span class="sinopsis">{{$tvshow->sinopsis}}</span>
                    @if ($paginate)
                        <a href="{{route('platforms.show',$tvshow->platform)}}">
                            {{__('viudb.you_can_see')}}
                            @if (Storage::disk('public')->exists("img/platform_".$tvshow->platform->id.".jpg"))
                                <img class="micro_platform" src="@php
                                    echo Storage::disk('public')->url('img/platform_'.$tvshow->platform->id.'.jpg')
                                @endphp ">
                            @else
                                {{$tvshow->platform->name}}
                            @endif
                        </a>
                    @endif
                </td>
                <td class="col">
                    {{-- TODO cambiar --}}
                    <a class="btn btn-outline-success" href="{{route('tvshows.create')}}" role="button">Crear Episodio</a>
                    <a class="btn btn-outline-warning" href="{{route('tvshows.edit',$tvshow)}}" role="button">{{__('viudb.edit')}}</a>
                    <a class="btn btn-outline-danger"
                    {{-- TODO: cambiar --}}
                      onclick="getDependencies(,
                                              'tvshows',
                                              'plataforma',
                                              'series'
                                              )"
                      role="button">{{__('viudb.delete')}}</a>
                </td>
            </tr>
        @endforeach
    </table>

    @if ($paginate)
        <div class="paginate d-flex justify-content-center">
            {{ $tvshows->links() }}
        </div>
    @endif

@else
    <div class="alert alert-warning mt-3 text-center">
        <strong>{{__('viudb.no_tvshows')}}</strong>
    </div>
@endif
