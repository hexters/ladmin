<x-ladmin-button data-bs-toggle="modal" data-bs-target="#delete-activity">
    Delete Activity
</x-ladmin-button>

<x-ladmin-modal id="delete-activity">
    <x-slot name="title">Delete</x-slot>
    <x-slot name="body">
        Due you want to Delete data older than {{ config('ladmin.activity.delete_period', 7) }} days?
    </x-slot>
    <x-slot name="footer">
        <form action="{{ route('ladmin.activities.destroy', uniqid()) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-ladmin-button type="button" color="secondary" data-bs-dismiss="modal">No</x-ladmin-button>
            <x-ladmin-button>Yes</x-ladmin-button>
        </form>
    </x-slot>
</x-ladmin-modal>