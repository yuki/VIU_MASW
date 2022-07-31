<form class="mt-2" name="create_celebrity" action="{{$route_path}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">{{__('viudb.name')}}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                @if (isset($celebrity))
                    value="{{old('name',$celebrity->name)}}"
                @else
                    value="{{old('name')}}"
                @endif
        />
    </div>
    <div class="form-group mb-3">
        <label for="surname" class="form-label">{{__('viudb.surname')}}</label>
        <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname"
                @if (isset($celebrity))
                    value="{{old('surname',$celebrity->surname)}}"
                @else
                    value="{{old('surname')}}"
                @endif
        />
    </div>
    <div class="mb-3">
        <label for="born">{{__('viudb.born')}}</label>
        <input class="form-control" type="date" id="born" name="born"
            @if (isset($celebrity))
                value="{{old('born',$celebrity->born)}}"
            @else
                value="{{old('born')}}"
            @endif
        />
      </div>
    <div class="form-group mb-3">
        <label for="nation" class="form-label">{{__('viudb.nation')}}</label>
        <input type="text" class="form-control" id="nation" name="nation"
            @if (isset($celebrity))
                value="{{old('nation',$celebrity->nation)}}"
            @else
                value="{{old('nation')}}"
            @endif
        />
    </div>
    <div class="form-group mb-3">
        <label for="url" class="form-label">{{__('viudb.url')}}</label>
        <input type="text" class="form-control" id="url" name="url"
            @if (isset($celebrity))
                value="{{old('url',$celebrity->url)}}"
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
