@extends('ladmin::layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-5 mt-5">

            <div class="text-center mb-5">
                <h4 class="font-weight-bold">Reset Password</h4>
            </div>

            <x-ladmin-card>
                <form method="POST" action="{{ route('administrator.password.update') }}">
                    @csrf

                    <div class="my-3">
                        <x-ladmin-alert />
                    </div>

                    <x-ladmin-input name="password" type="password" placeholder="New Password" class="px-5" old="true" required="true">
                        <x-slot name="prepend">
                            {!! ladmin()->icon('lock-open') !!}
                        </x-slot>
                    </x-ladmin-input>

                    <x-ladmin-input name="password_confirmation" type="password" placeholder="Confirm Password" class="px-5" old="true" required="true">
                        <x-slot name="prepend">
                            {!! ladmin()->icon('lock-closed') !!}
                        </x-slot>
                    </x-ladmin-input>
                    
                    <input type="hidden" name="email" value="{{ $email ?? old('email') }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group text-right mb-0">
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

