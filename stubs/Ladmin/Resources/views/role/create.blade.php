<x-ladmin-button type="button" data-bs-toggle="modal" data-bs-target="#modal-create-role">
    &plus; Add New
</x-ladmin-button>

<form action="{{ route('ladmin.role.store') }}" method="POST">
    @csrf
    <x-ladmin-modal id="modal-create-role">
        <x-slot name="title">Add New Role</x-slot>
        <x-slot name="body">
            @include(ladmin()->view_path('role._parts._form'), [
                'role' => new Ladmin\Engine\Models\LadminRole(),
            ])
        </x-slot>
        <x-slot name="footer">
            <x-ladmin-button type="button" color="secondary" data-bs-dismiss="modal">Close</x-ladmin-button>
            <x-ladmin-button>Submit</x-ladmin-button>
        </x-slot>
    </x-ladmin-modal>
</form>