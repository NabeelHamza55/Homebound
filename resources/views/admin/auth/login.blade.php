@extends('admin.layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="back-banner">
        <div class="custom-container">
            <div class="login-box">
                <div class="top-logo text-center">
                    <a href=""><img src="images/logo.png"></a>
                </div>
                <div class="top-title text-center">
                    <h1>Welcome Back!</h1>
                </div>
                <form class="login-form" method="post" action="{{ route('login.process') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="mail@gmail.com"
                            required="email">
                        <i class="user-icon"></i>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter password" required="password">
                        <i class="passsword-icon"></i>
                        <a href="#" class="view-text" id="togglePassword"><i class="view-icon"></i></a>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group d-flex">
                        <div class="custom-checkbox">
                            <input type="checkbox" class="hide-checbox" name="">
                            <label>
                                Remember me
                            </label>
                        </div>
                        <a href="forgot.html" class="color-red">Forgot Password</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn cst-yellow-button login">Log in</button>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <p>Don’t have an account? <a href="{{ route('create.registration') }}">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var passwordInput = document.getElementById('password');
            var togglePasswordButton = document.getElementById('togglePassword');

            togglePasswordButton.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });
        });
    </script>
@endsection
