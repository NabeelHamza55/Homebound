@extends('layout.header')
@section('main')
<div class="main-wrapper">
    <div class="dashboard-page">
        <div class="dashboard-row d-flex">
            @include('layout.sidebarmanu')
            <div class="dashboard-column right-content">
                <div class="top-header d-flex align-items-center">
                    <div class="top-title">
                        <h1>Account</h1>
                    </div>
                    <div class="right-head-button d-flex align-items-center">
                        <div class="dropdown bell-dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bell-icon"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dashbaord-banner">
                </div>
                <div class="dashboard-content">
                    <div class="add-properties">
                        <div class="upload-property">
                            <div class="inner-upload-property">
{{--                                <input type="file" class="hide-field" name="">--}}
                                <img src="images/profile-icon.png">
                                <a href="{{route('user.profile')}}"><span>Profile</span></a>
                            </div>

                            <div class="inner-upload-property">
                                <input type="file" class="hide-field" name="">
                                <img src="images/category-icon.png">
                                <span>Settings</span>
                            </div>

                            <div class="inner-upload-property">
                                <input type="file" class="hide-field" name="">
                                <img src="images/billing-icon.png">
                                <a href="{{route('billing')}}"><span>Billing</span></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
