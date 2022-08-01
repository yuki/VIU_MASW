<form class="mt-2" name="create_episode" action="{{$route_path}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">{{__('viudb.name')}}</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                @if (isset($episode))
                    value="{{old('name',$episode->name)}}"
                @else
                    value="{{old('name')}}"
                @endif
        />
    </div>

    <div class="form-group mb-3">
        <label for="sinopsis" class="form-label">{{__('viudb.sinopsis')}}</label>
        {{-- pongo todo seguido el contenido del textarea porque si no se llena de espacios --}}
        <textarea type="textarea" rows="3" class="form-control" id="sinopsis" name="sinopsis">@if(isset($episode)){{old('sinopsis',$episode->sinopsis)}}@else{{old('sinopsis')}}@endif</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="tvshow_id" class="form-label">{{__('viudb.tvshow_emision')}}</label>
        <select class="form-control @error('tvshow_id') is-invalid @enderror" aria-label="default-select" id="tvshow_id" name="tvshow_id" required>
            <option value=0>{{__('viudb.choose_tvshow')}}</option>
            @foreach ($tvshows as $tvshow)
                <option value={{$tvshow->id}}
                    @if (isset($episode))
                        @if ($episode->tvshow->id == $tvshow->id)
                            selected
                        @endif
                    @else
                        @if (old('tvshow_id') == $tvshow->id)
                            selected
                        @endif
                    @endif
                    >
                    {{$tvshow->name}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="released">{{__('viudb.released')}}</label>
        <input class="form-control" type="date" id="released" name="released"
            @if (isset($episode))
                value="{{old('released',$episode->released)}}"
            @else
                value="{{old('released')}}"
            @endif
        />
    </div>

    <div class="form-outline mb-3">
        <label for="season" class="form-label">{{__('viudb.season_long')}}</label>
        <input type="number"  class="form-control" id="season" name="season"
                @if (isset($episode))
                    value="{{old('season',$episode->season)}}"
                @else
                    value="{{old('season')}}"
                @endif
        />
    </div>

    <div class="form-outline mb-3">
        <label for="episode" class="form-label">{{__('viudb.episode_long')}}</label>
        <input type="number"  class="form-control" id="episode" name="episode"
                @if (isset($episode))
                    value="{{old('episode',$episode->episode)}}"
                @else
                    value="{{old('episode')}}"
                @endif
        />
    </div>

    <div class="form-group mb-3">
        <label for="file" class="form-label">{{__('viudb.select_img')}}</label>
        <input type="file" class="form-control-file" name="file" id="file">
    </div>
    <button type="submit" class="btn btn-primary" name="{{$button_name}}">{{$button_name}}</button>
  </form>
