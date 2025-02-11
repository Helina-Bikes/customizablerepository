@extends('layouts.navigation')
@section('title', 'Login')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if(session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get("success") }}
            </div>
        @endif
        @if(session()->has("error"))
            <div class="alert alert-danger">
                {{ session()->get("error") }}
            </div>
        @endif

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">Welcome Back</h3>
                <p class="small">Please sign in to continue</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input 
                            type="text" 
                            id="email" 
                            class="form-control rounded-pill" 
                            name="email" 
                            placeholder="Enter your email" 
                            required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="password" 
                            id="password" 
                            class="form-control rounded-pill" 
                            name="password" 
                            placeholder="Enter your password" 
                            required>
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block rounded-pill">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="#" class="text-decoration-none">Forgot Password?</a> | 
           <!-- <a href="{{ route('register') }}" class="text-decoration-none">Create an Account</a> -->
        </div>
    </div>
</div>
@endsection
