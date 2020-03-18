@extends('ladmin::layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-5 mt-5">
            <div class="text-center">
                <h4 class="font-weight-bold">Sign In</h4>
                <p><strong>Welcome!</strong> Go sign in to access administrator page.</p>
            </div>
            <x-ladmin-card class="mt-3">
                <form action="{{ route('administrator.login.store') }}" method="post" class="mt-5">
                    @csrf

                    @include('ladmin::layouts._alert')

                    <x-ladmin-input type="email" name="email" :value="old('email')">
                        <x-slot name="prepend">
                            <i class="fas fa-envelope"></i>
                        </x-slot>
                    </x-ladmin-input>

                    <x-ladmin-input type="password" name="password">
                        <x-slot name="prepend">
                            <i class="fas fa-lock"></i>
                        </x-slot>
                    </x-ladmin-input>
                    
                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember"> <label for="remember">Remember me</label>
                        <a href="" class="float-right mb-3">Forgot password ?</a>
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