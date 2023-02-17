<x-ladmin-auth-layout>
    <x-slot name="title">Profile</x-slot>

    <div class="row">
        <div class="col-lg-2 mb-3 text-center">
            <img src="{{ $user->gravatar }}" class="img-thumbnail mb-3" alt="Avatar" width="100"> <br>
            <a href="https://gravatar.com" target="_blank">Change</a>
        </div>
        <div class="col-lg-10 mb-3">
            <form action="{{ route('ladmin.profile.store') }}" method="POST">
                @csrf

                @include(ladmin()->view_path('admin._parts._form'), ['admin' => $user])

                <div class="row mb-3 d-flex align-items-center">
                    <label class="form-label col-lg-3">
                        Access Role
                    </label>
                    <div class="col">
                        <div class="py-2 px-3 border rounded bg-white">
                            {{ $user->roles()->pluck('name')->implode(',') }}
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <x-ladmin-button>Update</x-ladmin-button>
                </div>

            </form>
        </div>
    </div>

</x-ladmin-auth-layout>
