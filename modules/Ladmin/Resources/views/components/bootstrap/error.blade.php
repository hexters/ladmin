@if ($errors->any())
    <div class="alert mb-3 alert-danger rounded-0 alert-dismissible fade show">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <x-ladmin-button type="button" class="btn-close" color="white" data-bs-dismiss="alert" aria-label="Close"></x-ladmin-button>
    </div>
@endif
