@extends('admin.layouts.dashboard')
@section('content')
    <div class="dashboard-column right-content">
        <div class="top-header d-flex align-items-center">
            <div class="top-title">
                <h1>Profile</h1>
            </div>
            <div class="right-head-button d-flex align-items-center">
                <div class="dropdown bell-dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
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
                    <div style="width: 175px; margin-top: 1rem;background-color: transparent;"
                        class="inner-upload-property">
                        <img style="max-height: 100%;border-radius: 12px;"
                            src="{{ asset('/ProfilePicture/' . $user->profile_picture) }}">
                    </div>
                </div>
                <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data"
                    class="upload-property-form">
                    @csrf
                    <!--<div class="row">-->
                    <!--    <div class="col-lg-6 col-md-6 form-group">-->
                    <!--        <label>Chose new Profile Picture</label>-->
                    <!--        <input type="file" accept=".jpg, .jpeg, .png" class="form-control" name="profile_picture">-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="row">
                        <div class="col-lg-6 col-md-6 form-group">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 form-group">
                            <input type="number" class="form-control" name="phone_number" value="{{ $user->phone_number }}"
                                placeholder="Phone Number">
                        </div>
                        <div class="col-lg-6 col-md-6 form-group">
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 upload-property-button d-flex">
                            <button class="btn cst-res-button">Back</button>
                            <button class="btn cst-yellow-button">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
