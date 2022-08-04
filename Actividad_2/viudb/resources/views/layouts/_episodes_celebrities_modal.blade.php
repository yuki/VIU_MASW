<!-- Modal -->
<div class="modal fade" id="FilmographyModal" tabindex="-1" aria-labelledby="FilmographyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="FilmographyModalLabel">
                @if (isset($celebrity))
                    {{__('viudb.add_filmography_to')}}{{$celebrity->name}}  {{$celebrity->surname}}
                @else
                {{__('viudb.add_casting_to')}} {{$episode->name}}
                @endif
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="mt-2 col-md-12" name="add_filmography" action="" method="POST">
                @csrf
                @if (isset($celebrity))
                    <div class="form-group mb-3">
                    <label for="episode_id" class="form-label">{{__('viudb.choose_tvshow')}}</label>
                    <select class="form-control" aria-label="default-select" id="episode_id" name="episode_id" required>
                        <option value=0>{{__('viudb.choose_tvshow_episode')}}</option>
                        @foreach ($all_episodes as $epi)
                            <option value="{{$epi->id}}">
                                {{$epi->name}} - {{$epi->tvshow->name}}
                            </option>
                        @endforeach

                    </select>
                    </div>
                @else
                    <div class="form-group mb-3">
                        <label for="celebrity_id" class="form-label">{{__('viudb.choose_celebrity')}}</label>
                        <select class="form-control" aria-label="default-select" id="celebrity_id" name="celebrity_id" required>
                            <option value=0>{{__('viudb.choose_celebrity')}}</option>
                            @foreach ($all_celebrities as $celeb)
                                <option value="{{$celeb->id}}">
                                    {{$celeb->name}} {{$celeb->surname}}
                                </option>
                            @endforeach

                        </select>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="funcion_id" class="form-label">{{__('viudb.choose_perform')}}</label>
                    <select class="form-control" aria-label="default-select" id="funcion_id" name="funcion" required>
                        <option value=0>{{__('viudb.perform_as')}}</option>
                        @foreach ($performances as $performance)
                            <option value="{{$performance}}">
                                {{$performance}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success" id="addFilmography" name="addFilmography">{{__('viudb.add')}}</button>
            </form>


        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <!-- / Modal -->
