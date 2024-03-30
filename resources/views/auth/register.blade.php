@extends('layout.auth')
@section('title')
    {{ ('Register') }}
@endsection
@section('main')
    <div class="main-wrapper">
        <div class="back-banner">
            <div class="custom-container">
                <div class="login-box">
                    <div class="top-logo text-center">
                        <a href=""><img src="images/logo.png"></a>
                    </div>
                    <div class="top-title text-center">
                        <h1>Create Account</h1>
                    </div>
                    <form class="login-form" method="POST" action="{{ route('registration.process') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required="">
                            <i class="user-icon"></i>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="mail@gmail.com" required="">
                            <i class="user-icon"></i>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" placeholder="0321 75 66414" required="">
                            <i class="user-icon"></i>
                            @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" required="">
                            <i class="passsword-icon"></i>
                            <a href="" class="view-text"><i class="view-icon"></i></a>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" accept=".jpg, .jpeg, .png" class="form-control" name="profile_picture">
                            <i class="user-icon"></i>
                            @error('profile_picture')
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
                            <button type="submit" class="btn cst-yellow-button login">Sign in</button>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <p>Do have an account? <a href="{{ route('login') }}">Log In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
