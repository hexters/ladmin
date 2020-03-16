@extends('ladmin::layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-5 mt-5">
        <div class="text-center">
            <h4 class="font-weight-bold">Sign In</h4>
            <p><strong>Welcome!</strong> Go sign in to access administrator page.</p>
        </div>
        <div class="card border-0 shadow-sm rounded-lg mt-3">
            <div class="card-body p-5">
            <form action="{{ route('administrator.login.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white border-right-0" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email" placeholder="Email Address" class="form-control border-left-0">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white border-right-0" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" placeholder="Password" name="password" class="form-control border-left-0">
                    </div>
                </div>

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
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="">&larr; Back To Home</a>
        </div>
        </div>
    </div>
</div>
@endsection