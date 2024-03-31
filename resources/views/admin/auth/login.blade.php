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
                <form class="login-form">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="" placeholder="mail@gmail.com">
                        <i class="user-icon"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="" placeholder="Enter password">
                        <i class="passsword-icon"></i>
                        <a href="" class="view-text"><i class="view-icon"></i></a>
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
                        <button class="btn cst-yellow-button login">Log in</button>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <p>Don’t have an account? <a href="create-account.html">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
