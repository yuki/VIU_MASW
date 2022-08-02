<a class="btn btn-outline-warning" href="{{route('episodes.edit',$episode)}}" role="button">{{__('viudb.edit')}}</a>
                    <a class="btn btn-outline-danger"
                      onclick="getDependencies({{$episode->id}},
                                              'episodes',
                                              'plataforma',
                                              'series',
                                              '{{csrf_token()}}'
                                              )"
                      role="button">{{__('viudb.delete')}}</a>
