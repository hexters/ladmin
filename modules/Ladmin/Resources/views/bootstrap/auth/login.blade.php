<x-ladmin-guest-layout meta-title="Sign In">

    <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-lg-4 col-md-6 col-sm-10 col-xs-10">
            <x-ladmin-card class="mx-3 mb-5 rounded-lg">
                <x-slot name="body">
                    <div class="px-4">
                        <div class="text-center p-3">
                            <img src="{{ config('ladmin.logo') }}" alt="Logo" class="mb-3" width="200">
                            <div>Sign in as {{ config('ladmin.prefix') }}</div>
                        </div>

                        <x-ladmin-alert class="mb-3" />

                        <form action="{{ route('ladmin.login.attempt') }}" method="POST">
                            @csrf

                            <x-ladmin-input type="email" class="mb-3" name="email" value="{{ old('email') }}" placeholder="E-mail Address" />

                            <x-ladmin-input type="password" class="mb-4" name="password" placeholder="Password" />

                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <div>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Remember me</label>
                                </div>

                                @if (Route::has('ladmin.password.form'))
                                    <div>
                                        <a href="{{ route('ladmin.password.form') }}">Forgot password?</a>
                                    </div>
                                @endif

                            </div>

                            <div class="text-end mb-4">
                                <x-ladmin-button>Sign In</x-ladmin-button>
                            </div>
                        </form>
                    </div>
                </x-slot>
            </x-ladmin-card>

            <div class="text-center">
                <a href="{{ url('/') }}">&larr; Back to home</a>
            </div>
        </div>
    </div>

</x-ladmin-guest-layout>
