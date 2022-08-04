<!-- Modal -->
<div class="modal fade" id="LanguageModal" tabindex="-1" aria-labelledby="LanguageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="LanguageModalLabel">
                {{__('viudb.add_language_to')}} {{$episode->name}}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="mt-2 col-md-12" name="add_language" action="" method="POST">
                @csrf

                <div class="form-group mb-3">
                <label for="language_id" class="form-label">{{__('viudb.choose_language')}}</label>
                <select class="form-control" aria-label="default-select" id="language_id" name="language_id" required>
                    <option value=0>{{__('viudb.choose_episode_language')}}</option>
                    @foreach ($all_languages as $lang)
                        <option value="{{$lang->id}}">
                            {{$lang->name}}
                        </option>
                    @endforeach

                </select>
                </div>


                <div class="mb-3">
                    <label for="funcion_id" class="form-label">{{__('viudb.choose_type')}}</label>
                    <select class="form-control" aria-label="default-select" id="type" name="type" required>
                        <option value=0>{{__('viudb.type')}}</option>
                        @foreach ($types as $types)
                            <option value="{{$types}}">
                                {{$types}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success" id="addLanguage" name="addLanguage">{{__('viudb.add')}}</button>
            </form>


        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <!-- / Modal -->
