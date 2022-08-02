<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">{{__('viudb.sure?')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger" role="alert">
            {{__('viudb.cannot_undone')}}
          </div>
          <div id="mensaje"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('viudb.close')}}</button>
          <button type="button" class="btn btn-danger" id="borrar">{{__('viudb.sure')}}</button>
        </div>
      </div>
    </div>
  </div>
  <!-- / Modal -->
