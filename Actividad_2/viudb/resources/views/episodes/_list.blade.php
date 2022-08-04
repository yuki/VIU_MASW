@if (count($episodes)> 0)
    <table class="col">
        <thead>
            <tr>
                <th></th>
                @if ($show_cover)
                    <th></th>
                @endif
                <th class="text-center">{{__('viudb.sinopsis')}}</th>
                <th class="text-center">{{__('viudb.season')}} - {{__('viudb.episode')}}</th>
                @if (isset($celebrity))
                    <th></th>
                @endif
                <th class="text-center">{{__('viudb.actions')}}</th>
            </tr>
        </thead>
        @foreach ($episodes as $episode)
            <tr>
                @if ($show_cover)
                    <td class="col-2 text-center">
                        <a href="{{route('tvshows.show',$episode->tvshow->id)}}">
                            @if (Storage::disk('public')->exists("img/tvshow_".$episode->tvshow->id.".jpg"))
                                <img class="micro_tvshow" src="@php
                                    echo Storage::disk('public')->url('img/tvshow_'.$episode->tvshow->id.'.jpg')
                                @endphp ">
                            @else
                                {{$episode->tvshow->name}}
                            @endif
                        </a>
                    </td>
                @endif
                <td  class="col-3 text-center">
                    <a href="{{route('episodes.show',$episode)}}">
                        @if (Storage::disk('public')->exists("img/episode_".$episode->id.".jpg"))
                                <img class="episode" src="@php
                                    echo Storage::disk('public')->url('img/episode_'.$episode->id.'.jpg')
                                @endphp ">
                            <br>
                        @endif
                        {{$episode->name}}
                    </a>
                </td>
                <td class="col-4">
                    {{$episode->sinopsis}} <br>
                    <strong>{{__('viudb.released')}}:</strong> {{$episode->fecha()}}
                </td>
                <td class="col-1 text-center">{{$episode->season}} - {{$episode->episode}}</td>
                @if (isset($celebrity))
                    <td class="col-1 text-center">{{$episode->pivot->perform_as}}</td>
                @endif
                <td class="col text-center">
                    @if (isset($celebrity))
                        <a class="btn btn-outline-danger btn"
                            onclick="confirmDeleteFilmography({{$celebrity->id}},
                                            {{$episode->id}},
                                            '{{$episode->pivot->perform_as}}',
                                            '{{csrf_token()}}'
                                            )"
                            role="button">
                            Borrar aparición
                        </a>
                    @else
                        @include('episodes._buttons')
                    @endif


                </td>
            </tr>
        @endforeach
    </table>

    @if ($show_cover)
        <div class="paginate d-flex justify-content-center">
            {{ $episodes->links() }}
        </div>
    @endif

@else
    <div class="alert alert-warning mt-3 text-center">
        <strong>{{__('viudb.no_episodes')}}</strong>
    </div>
@endif
