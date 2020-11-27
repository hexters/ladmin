@can(['administrator.system.activity.delete'])
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-delete-data">
    Delete
  </button>

  <div class="modal fade" id="modal-delete-data" tabindex="-1" aria-labelledby="modal-delete-dataLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="POST" action="{{ route('administrator.system.activity.destroy', 0) }}">
        @csrf
        @method('DELETE')
        <div class="modal-content">
          <div class="modal-header border-0">
            <h5 class="modal-title" id="modal-delete-dataLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Do you want to delete data older than 7 days permanently!?</p>
          </div>
          <div class="modal-footer border-0">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger">Yes</button>
          </div>
        </div>
      </form>
    </div>
  </div>  
@endcan
