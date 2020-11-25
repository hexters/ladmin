@extends('ladmin::layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-5 mt-5">
            <div class="text-center">
                <h4 class="font-weight-bold">Sign In</h4>
                <p><strong>Welcome!</strong> Go sign in to access administrator page.</p>
            </div>

            <x-ladmin-alert />

            <x-ladmin-card class="mt-3">

                <div class="text-center mb-3">
                    @if (config('ladmin.logo'))
                        <img src="{{ config('ladmin.logo') }}" alt="Logo" width="150">
                    @else 
                        {{ config('app.name') }}
                    @endif
                </div>

                <form action="{{ url( config('ladmin.prefix', 'administrator') . '/login') }}" method="post" class="my-3 mx-4">
                    @csrf
                    <x-ladmin-input type="email" name="email" :old="true" placeholder="Email Address">
                        <x-slot name="prepend">
                            {!! ladmin()->icon('at-symbol') !!}
                        </x-slot>
                    </x-ladmin-input>

                    <x-ladmin-input type="password" name="password" placeholder="Password">
                        <x-slot name="prepend">
                            {!! ladmin()->icon('lock-closed') !!}
                        </x-slot>
                    </x-ladmin-input>
                    
                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember"> <label for="remember">Remember me</label>
                        <a href="{{ route('administrator.password.request') }}" class="float-right mb-3">Forgot password ?</a>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            Sign In
                        </button>
                    </div>
                </form>
            </x-ladmin-card>

            <div class="text-center mt-5">
                <a href="{{ url('/') }}">&larr; Back To Home</a>
            </div>
        </div>
    </div>
</div>
@endsection