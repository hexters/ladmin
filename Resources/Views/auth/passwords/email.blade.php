@extends('ladmin::layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-5 mt-5">

            <div class="text-center mb-5">
                <h4 class="font-weight-bold">Reset Password</h4>
            </div>

            <x-ladmin-card>
                <form method="POST" action="{{ route('administrator.password.email') }}">
                    @csrf

                    <div class="my-3">
                        <x-ladmin-alert />
                    </div>

                    <x-ladmin-input name="email" type="email" placeholder="Email Address" class="px-5" old="true" required="true">
                        <x-slot name="prepend">
                            {!! ladmin()->icon('at-symbol') !!}
                        </x-slot>
                    </x-ladmin-input>
                    
                    <div class="form-group text-right mb-0">
                        <a href="{{ route('administrator.login') }}" class="btn btn-link float-left">&larr; Back to Login</a>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </x-ladmin-card>
        </div>
    </div>
</div>
@endsection
