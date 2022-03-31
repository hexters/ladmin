@can('role.assign')
    <a href="{{ route('ladmin.role.show', ladmin()->back($role->id)) }}" class="btn btn-sm btn-primary">Assign
        Permission</a>
@endcan

@can(['role.update'])
    <a href="" data-bs-toggle="modal" class="btn btn-sm btn-outline-primary"
        data-bs-target="#modal-edit-role-{{ $role->id }}">
        Edit Role
    </a>

    <!-- Modal -->
    <div class="modal fade" id="modal-edit-role-{{ $role->id }}" tabindex="-1"
        aria-labelledby="modal-edit-role-{{ $role->id }}Label" aria-hidden="true">
        <form action="{{ route('ladmin.role.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="modal-edit-role-{{ $role->id }}Label">Edit Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include(ladmin()->view_path('role._parts._form'), ['role' => $role])
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endcan

@if ($role->id > 1)
    @can(['role.destroy'])
        <a href="" data-bs-toggle="modal" class="btn btn-sm btn-outline-danger"
            data-bs-target="#modal-delete-role-{{ $role->id }}">
            Delete
        </a>

        <div class="modal text-start fade" id="modal-delete-role-{{ $role->id }}" tabindex="-1"
            aria-labelledby="modal-delete-role-{{ $role->id }}Label" aria-hidden="true">
            <form action="{{ route('ladmin.role.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="modal-delete-role-{{ $role->id }}Label">Delete Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this role?
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger text-white">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endcan
@endif
