<a class="btn btn-outline-warning" href="{{route('celebrities.edit',$celebrity)}}" role="button">{{__('viudb.edit')}}</a>
<a class="btn btn-outline-danger"
    onclick="getDependencies({{$celebrity->id}},
                            'celebrities',
                            'celebrities',
                            'celebrities',
                            '{{csrf_token()}}'
                            )"
    role="button">
    {{__('viudb.delete')}}
</a>
