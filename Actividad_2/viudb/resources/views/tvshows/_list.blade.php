@if (count($tvshows)> 0)
    <table class="offset-1 col-10">
        @foreach ($tvshows as $tvshow)
            <tr>
                @if ($paginate)
                    <td class="col-1 text-center">
                        @if (Storage::disk('public')->exists("img/platform_".$tvshow->platform->id.".jpg"))
                            <a href="{{route('platforms.show',$tvshow->platform)}}">
                                <img class="mini_platform" src="@php
                                    echo Storage::disk('public')->url('img/platform_'.$tvshow->platform->id.'.jpg')
                                @endphp ">
                            </a>
                        @endif
                        <br>
                        <a href="{{route('platforms.show',$tvshow->platform)}}">{{$tvshow->platform->name}}</a>
                    </td>
                @endif

                <td class="col-3 text-center">
                    @if (Storage::disk('public')->exists("img/tvshow_".$tvshow->id.".jpg"))
                        <a href="{{route('tvshows.show',$tvshow)}}">
                            <img class="tvshow" src="@php
                                echo Storage::disk('public')->url('img/tvshow_'.$tvshow->id.'.jpg')
                            @endphp ">
                        </a>
                    @endif
                    <br>
                    <a href="{{route('tvshows.show',$tvshow)}}">{{$tvshow->name}}</a>
                </td>
                <td class="text-start col-4">{{$tvshow->sinopsis}}</td>
                <td>
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
