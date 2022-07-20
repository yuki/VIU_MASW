@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="mt-2 offset-2 col-5" name="create_platform" action="{{$route_path}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">{{__('viudb.name')}}</label>
        <input type="text" class="form-control" id="name" name="name"

                @if (isset($platform))
                    value="{{$platform->name}}"

                @endif
        />
    </div>
    <div class="form-group mb-3">
        <label for="file" class="form-label">{{__('viudb.select_img')}}</label>
        <input type="file" class="form-control-file" name="file" id="file">
    </div>
    <div class="form-group mb-3">
        @if (isset($platform))
            <input type="hidden" class="form-control" id="id" name="id" value="'.$platform->getId().'" />
        @endif
    </div>
    <button type="submit" class="btn btn-primary" name="{{$button_name}}">{{$button_name}}</button>
  </form>
