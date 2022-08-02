<a class="btn btn-outline-success" href="{{route('episodes.create')}}?tvshow_id={{$tvshow->id}}" role="button">Crear Episodio</a>
<a class="btn btn-outline-warning" href="{{route('tvshows.edit',$tvshow)}}" role="button">{{__('viudb.edit')}}</a>
<a class="btn btn-outline-danger"
    onclick="getDependencies({{$tvshow->id}},
                          'tvshows',
                          'serie',
                          'episodios',
                          '{{csrf_token()}}'
                          )"
    role="button">
    {{__('viudb.delete')}}
</a>
