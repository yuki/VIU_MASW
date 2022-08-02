<a class="btn btn-outline-success" href="{{route('tvshows.create')}}?platform_id={{$platform->id}}" role="button">{{__('viudb.create_tvshow')}}</a>
<a class="btn btn-outline-warning" href="{{route('platforms.edit',$platform)}}" role="button">{{__('viudb.edit')}}</a>
<a class="btn btn-outline-danger"
    onclick="getDependencies({{$platform->id}},
                            'platforms',
                            'plataforma',
                            'series',
                            '{{csrf_token()}}'
                            )"
    role="button">
    {{__('viudb.delete')}}
</a>
