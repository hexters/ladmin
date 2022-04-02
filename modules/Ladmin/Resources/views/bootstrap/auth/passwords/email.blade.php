<x-ladmin-guest-layout meta-title="Reset Password">

    <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-lg-4 col-md-6 col-sm-10 col-xs-10">
            
            <form action="{{ route('ladmin.password.send-link-email') }}" method="POST">
                @csrf
                <x-ladmin-card class="mx-3 mb-5 rounded-lg">
                    <x-slot name="body">
                        <h5 class="mb-3">Reset Password</h5>

                        <x-ladmin-alert class="mb-3" />

                        <x-ladmin-input class="mb-3" placeholder="E-mail Address" name="email" type="email" />
    
                        <div class="text-end mb-3">
                            <x-ladmin-button>
                                Send Password Reset Link
                            </x-ladmin-button>
                        </div>
                    </x-slot>
                </x-ladmin-card>
            </form>


            <div class="text-center">
                <a href="{{ route('ladmin.login') }}">&larr; Back to login</a>
            </div>
        </div>
    </div>

</x-ladmin-guest-layout>
