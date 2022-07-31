<form class="mt-2" name="create_language" action="{{$route_path}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">{{__('viudb.name')}}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                @if (isset($language))
                    value="{{old('name',$language->name)}}"
                @else
                    value="{{old('name')}}"
                @endif
        />
    </div>
    <div class="form-group mb-3">
        <label for="rfc_code" class="form-label">{{__('viudb.rfc_code')}} <a href="https://registry-page.isdcf.com/languages/">RFC_5646</a></label>
        <input type="text" class="form-control @error('rfc_code') is-invalid @enderror" id="rfc_code" name="rfc_code"
                @if (isset($language))
                    value="{{old('surname',$language->rfc_code)}}"
                @else
                    value="{{old('rfc_code')}}"
                @endif
        />
    </div>

    <button type="submit" class="btn btn-primary" name="{{$button_name}}">{{$button_name}}</button>
</form>

