@can(['administrator.system.activity.delete'])
<div class="dropdown d-inline">
  <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Delete
  </a>

  <div class="dropdown-menu p-0 mt-2" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="javascript:void(0);">No</a>
    <a class="dropdown-item bg-danger text-white" href="javascript:void(0);" onclick="
      document.getElementById('form-delete-older-actifity').submit();
      ">Yes!</a>
  </div>
</div>

<strong class="ml-3 d-none d-md-inline">Delete data older than {{ config('ladmin.log_activity_life', 7) }} days</strong>
  
  <form method="POST" id="form-delete-older-actifity" action="{{ route('administrator.system.activity.destroy', 0) }}">
    @csrf
    @method('DELETE')
  </form>
@endcan
