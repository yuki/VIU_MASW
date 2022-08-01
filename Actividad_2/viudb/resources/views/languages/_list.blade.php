@if (count($languages)> 0)
    <table class="offset-3 col-6">
        @foreach ($languages as $language)
            <tr>
                <td class="text-start">{{$language->name}}</td>
                <td class="text-start">{{$language->rfc_code}}</td>
                <td class="text-start">
                    {{-- TODO cambiar --}}
                    <a class="btn btn-outline-warning" href="{{route('languages.edit',$language)}}" role="button">{{__('viudb.edit')}}</a>
                    <a class="btn btn-outline-danger"
                    {{-- TODO: cambiar --}}
                      onclick="getDependencies(,
                                              'languages',
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
            {{ $languages->links() }}
        </div>
    @endif

@else
    <div class="alert alert-warning mt-3 text-center">
        <strong>{{__('viudb.no_languages')}}</strong>
    </div>
@endif
