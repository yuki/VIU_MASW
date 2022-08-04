@if (count($languages)> 0)
    <table class="offset-3 col-6">
        <thead>
            <tr>
                <th>{{__('viudb.language')}}</th>
                <th>RFC_5646</th>
                @if (isset($episode))
                    <th>{{__('viudb.type')}}</th>
                @endif
                <th class="text-center">{{__('viudb.actions')}}</th>
            </tr>
        </thead>
        @foreach ($languages as $language)
            <tr>
                <td class="text-start">{{$language->name}}</td>
                <td class="text-start">{{$language->rfc_code}}</td>
                @if (isset($episode))
                    <td>{{$language->pivot->type}}</td>
                @endif
                <td class="text-center">
                    @if (isset($episode))
                        <a class="btn btn-outline-danger btn"
                            onclick="confirmDeleteLanguageEpisode({{$episode->id}},
                                            {{$language->id}},
                                            '{{$language->pivot->type}}',
                                            '{{csrf_token()}}'
                                            )"
                            role="button">
                            Borrar idioma del episodio
                        </a>
                    @else
                        @include('languages._buttons')
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

    {{-- @if ($paginate) --}}
        <div class="paginate d-flex justify-content-center">
            {{ $languages->links() }}
        </div>
    {{-- @endif --}}

@else
    <div class="alert alert-warning mt-3 text-center">
        <strong>{{__('viudb.no_languages')}}</strong>
    </div>
@endif
