<x-ladmin-auth-layout>
    <x-slot name="title">Home</x-slot>


    <div class="row justify-content-center">
        <div class="col-lg-3 text-center">
            <x-ladmin-card class="mb-3">
                <x-slot name="body">
                    <div class="mb-3">
                        <img src="{{ $user->gravatar }}" alt="Avatar" width="150"
                            class="mb-3 img-thumbnail rounded-circle">
                        <h5>{{ $user->name }}</h5>
                        <p>
                            <small class="text-muted">{{ $user->roles->pluck('name')->join(', ') }}</small>
                        </p>
                    </div>

                    <a href="{{ route('ladmin.profile.edit', ladmin()->back()) }}"
                        class="btn btn-outline-primary btn-sm w-50">Edit
                        Profile</a>

                    <a class="btn btn-outline-primary btn-sm" href="" data-bs-toggle="modal"
                        data-bs-target="#modal-logout">
                        <i class="fas fa-power-off"></i>
                    </a>
                </x-slot>
            </x-ladmin-card>
        </div>
        <div class="col-lg-9">
            <x-ladmin-card class="mb-3">
                <x-slot name="body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="caard-title fw-bold">Welcome to {{ config('app.name') }}</h5>
                        <div class="text-muted">{{ now()->format('D m d, Y') }}</div>
                    </div>
                    <p>{!! $inspire !!}</p>
                </x-slot>
            </x-ladmin-card>

            <div class="row mb-3">
                <div class="col-lg-4">
                    <x-ladmin-card class="mb-3">
                        <x-slot name="body">
                            <h5 class="card-title">Admin Online</h5>

                            <div class="d-flex align-items-center">
                                <div class="mx-3">
                                    <i class="fa-solid fa-earth-asia fa-3x text-primary"></i>
                                </div>
                                <div class="mx-3 flex-grow-1">
                                    <h1 data-role="ajax"
                                        data-route="{{ route('ladmin.index', ['ajax' => 'load_total_online']) }}">
                                    </h1>
                                </div>
                            </div>

                        </x-slot>
                    </x-ladmin-card>
                </div>
                <div class="col-lg-4">
                    <x-ladmin-card class="mb-3">
                        <x-slot name="body">
                            <h5 class="card-title">Admin Online</h5>
                            <div data-role="ajax"
                                data-route="{{ route('ladmin.index', ['ajax' => 'load_percenteage_online']) }}">
                            </div>
                        </x-slot>
                    </x-ladmin-card>
                </div>
                <div class="col-lg-4">
                    <x-ladmin-card class="mb-3">
                        <x-slot name="body">
                            <h5 class="card-title">Admin Total</h5>
                            <h1 data-role="ajax"
                                data-route="{{ route('ladmin.index', ['ajax' => 'load_total_admin']) }}"></h1>
                        </x-slot>
                    </x-ladmin-card>
                </div>
            </div>

            <div class="mb-3">
                <x-ladmin-card class="mb-3">
                    <x-slot name="body">
                        <h5 class="card-title">Your Coworkers</h5>

                        <div class="table-responsive" data-role="ajax"
                            data-route="{{ route('ladmin.index', ['ajax' => 'load_table_coworkers']) }}">

                        </div>
                    </x-slot>
                </x-ladmin-card>
            </div>

        </div>
    </div>




</x-ladmin-auth-layout>
