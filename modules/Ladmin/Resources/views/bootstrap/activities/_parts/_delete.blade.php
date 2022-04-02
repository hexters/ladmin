<x-ladmin-button data-bs-toggle="modal" data-bs-target="#exampleModal">
    Delete Activity
</x-ladmin-button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('ladmin.activities.destroy', uniqid()) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <x-ladmin-button type="button" color="white" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></x-ladmin-button>
                </div>
                <div class="modal-body">
                    Due you want to Delete data older than {{ config('ladmin.activity.delete_period', 7) }} days?
                </div>
                <div class="modal-footer  border-0">
                    <x-ladmin-button type="button" color="secondary" data-bs-dismiss="modal">No</x-ladmin-button>
                    <x-ladmin-button>Yes</x-ladmin-button>
                </div>
            </div>
        </div>
    </form>
</div>
