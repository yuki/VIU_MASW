<a class="btn btn-outline-warning" href="{{route('languages.edit',$language)}}" role="button">{{__('viudb.edit')}}</a>
<a class="btn btn-outline-danger"
    onclick="getDependencies({{$language->id}},
                            'languages',
                            'languages',
                            'languages',
                            '{{csrf_token()}}'
                            )"
    role="button">
    {{__('viudb.delete')}}
</a>
