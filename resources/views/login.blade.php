@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
        
            <div class="card shadow-lg rounded-lg border-0 transition-transform transform-gpu animate__animated animate__fadeIn">
                <div class="card-header bg-success text-white text-center py-4">
                    <h4>{{ __('Login to Your Account') }}</h4>
                    <p class="mb-0">Welcome back! Please enter your credentials.</p>
                </div>

                <div class="card-body p-5 position-relative">
              
                    <div class="bg-overlay"></div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success btn-lg btn-block rounded-pill transition-transform hover:scale-105">
                                    Login <i class="fas fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                
            </div>
        </div>
    </div>
</div>

<style>
    
    body {
        background-image: url('/images/inside.jpg'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.1);
        z-index: 0;
        border-radius: inherit;
        pointer-events: none;
        transition: opacity 0.5s ease-in-out;
    }

    .transition-transform {
        transition: transform 0.3s ease-in-out;
    }
    .transform-gpu {
        transform: translateZ(0);
    }
    .animate__animated {
        animation-duration: 1s;
        animation-fill-mode: both;
    }
    .animate__fadeIn {
        animation-name: fadeIn;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    .hover\:scale-105:hover {
        transform: scale(1.05);
    }
    .form-control {
        border-radius: 10px;
        transition: box-shadow 0.3s ease;
    }
    .form-control:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        border-radius: 10px;
        transition: background-color 0.3s ease;
    }
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
@endsection


