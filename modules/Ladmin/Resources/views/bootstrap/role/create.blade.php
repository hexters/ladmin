<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-role">
    &plus; Add New
</button>

<!-- Modal -->
<div class="modal fade" id="modal-create-role" tabindex="-1" aria-labelledby="modal-create-roleLabel"
    aria-hidden="true">
    <form action="{{ route('ladmin.role.store') }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="modal-create-roleLabel">Add New Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include(ladmin()->view_path('role._parts._form'), [
                        'role' => new Modules\Ladmin\Models\LadminRole(),
                    ])
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
