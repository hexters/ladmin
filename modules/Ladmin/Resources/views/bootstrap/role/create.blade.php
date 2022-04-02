<!-- Button trigger modal -->
<x-ladmin-button type="button" data-bs-toggle="modal" data-bs-target="#modal-create-role">
    &plus; Add New
</x-ladmin-button>

<!-- Modal -->
<div class="modal fade" id="modal-create-role" tabindex="-1" aria-labelledby="modal-create-roleLabel"
    aria-hidden="true">
    <form action="{{ route('ladmin.role.store') }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="modal-create-roleLabel">Add New Role</h5>
                    <x-ladmin-button type="button" class="btn-close" color="white" data-bs-dismiss="modal" aria-label="Close"></x-ladmin-button>
                </div>
                <div class="modal-body">
                    @include(ladmin()->view_path('role._parts._form'), [
                        'role' => new Modules\Ladmin\Models\LadminRole(),
                    ])
                </div>
                <div class="modal-footer border-0">
                    <x-ladmin-button type="button" color="secondary" data-bs-dismiss="modal">Close</x-ladmin-button>
                    <x-ladmin-button>Submit</x-ladmin-button>
                </div>
            </div>
        </div>
    </form>
</div>
