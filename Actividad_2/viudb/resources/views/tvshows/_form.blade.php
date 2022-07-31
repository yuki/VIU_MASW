<form class="mt-2" name="create_tvshow" action="{{$route_path}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">{{__('viudb.name')}}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                @if (isset($tvshow))
                    value="{{old('name',$tvshow->name)}}"
                @else
                    value="{{old('name')}}"
                @endif
        />
    </div>

    <div class="form-group mb-3">
        <label for="platform_id" class="form-label">{{__('viudb.platform_emision')}}</label>
        <select class="form-control @error('platform_id') is-invalid @enderror" aria-label="default-select" id="platform_id" name="platform_id" required>
            <option value=0>{{__('viudb.choose_platform')}}</option>
            @foreach ($platforms as $platform)
                <option value={{$platform->id}}
                    @if (isset($tvshow))
                        @if ($tvshow->platform->id == $platform->id)
                            selected
                        @endif
                    @else
                        @if (old('platform_id') == $platform->id)
                            selected
                        @endif
                    @endif
                    >
                    {{$platform->name}}
                </option>
            @endforeach
        </select>
      </div>


    <div class="form-group mb-3">
        <label for="sinopsis" class="form-label">{{__('viudb.sinopsis')}}</label>
        {{-- pongo todo seguido el contenido del textarea porque si no se llena de espacios --}}
        <textarea type="textarea" rows="3" class="form-control" id="sinopsis" name="sinopsis">@if(isset($tvshow)){{old('sinopsis',$tvshow->sinopsis)}}@else{{old('sinopsis')}}@endif</textarea>
    </div>
    <div class="form-group mb-3">
        <label for="url" class="form-label">{{__('viudb.url')}}</label>
        <input type="text" class="form-control" id="url" name="url"
            @if (isset($tvshow))
                value="{{old('url',$tvshow->url)}}"
            @else
                value="{{old('url')}}"
            @endif
        />
    </div>
    <div class="form-group mb-3">
        <label for="file" class="form-label">{{__('viudb.select_img')}}</label>
        <input type="file" class="form-control-file" name="file" id="file">
    </div>
    <button type="submit" class="btn btn-primary" name="{{$button_name}}">{{$button_name}}</button>
  </form>
