@extends('layout.header')
@section('main')
<style>
    body {
        padding: 0;
        margin: 0;
    }

    .self-csss {
        position: relative;
        right: 4rem;
        top: 0.5rem;
    }

    .btnn-css1 {
        /* width: 2.5rem; */
    }

    .btnn-css2 {
        width: 2.5rem;
        margin-top: 2px;
    }

    .new-img{
        height:200px !important;
        width:200px !important;
        border-radius:12px;
    }

    .inner-upload-property {
        width: 285px;
        height: 200px;
    }

    .preview-container {
        flex-wrap: wrap;
    }

    .inner-upload-property {
        position: relative;
        border-radius: 15px;
        background: #FEFEFE;
        width: 200px;
        height: 200px;
        text-align: center;
        justify-content: center;
        display: flex;
        align-items: center;
        margin: 0 0 40px 0;
        flex-wrap: wrap;
        flex-direction: column;
    }

    .inner-upload-property input.hide-field {
        position: absolute;
        width: 100%;
        height: 100%;
        cursor: pointer;
        opacity: 0;
    }

    .inner-upload-property span {
        color: #B48B52;
        font-size: 18px;
        width: 100%;
        margin: 10px 0 0;
        opacity: 0.5;
    }

    .inner-upload-property img {
        opacity: 0.5;
    }

    .form-control {
        border-radius: 15px;
        border: 1px solid rgba(0, 0, 0, 0.20);
        background: #FFF;
        height: 60px;
        padding: 0 15px;
    }
</style>
<div class="main-wrapper">
    <div class="dashboard-page">
        <div class="dashboard-row d-flex">
            @include('layout.sidebarmanu')
            <div class="dashboard-column right-content">
                <div class="top-header d-flex align-items-center">
                    <div class="top-title">
                        <h1>Add Property</h1>
                    </div>
                    <div class="right-head-button d-flex align-items-center">
                        <div class="dropdown bell-dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <a class="btn golden-button">Add or Search Property</a>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{route('add.property')}}">Add Property</a></li>
                                <li><a class="dropdown-item" href="{{route('search.property')}}">Search Property</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dashbaord-banner">
                </div>
                <div class="dashboard-content">
                    <div class="add-properties">
                        <form action="{{route('add.process.property')}}" method="post" enctype="multipart/form-data"
                            class="upload-property-form" id="upload-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 form-group">
                                    <div style="display: flex;flex-direction: row;" id="file-input-container">
                                        <div class="file-input-group">
                                            <div class="d-flex" id="image-container">
                                                <div class="inner-upload-property mx-2 preview-container"
                                                    id="preview-container-0">
                                                    <input type="file" class="hide-field" accept="image/*"
                                                        id="add-file-input-0" name="home_picture_input[]"  multiple="multiple">
                                                    <img    src="{{asset('images/camera.png')}}">
                                                    <span>Add Property</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 form-group">
                                    <h5 class='lbl'>Address</h5>
                                    <input type="text" class="form-control" name="address" value=""
                                        placeholder="Address here" required>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <h5 class='lbl'>City</h5>
                                    <input type="text" class="form-control upload-property-form" name="city" value=""
                                        placeholder="City here" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 form-group">
                                    <h5 class='lbl'>State</h5>
                                    <input type="text" class="form-control upload-property-form" name="state" value=""
                                        placeholder="State" required>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <h5 class='lbl'>Zip Code</h5>
                                    <input type="text" class="form-control" name="code" value=""
                                        placeholder="000000" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 form-group">
                                    <input type="address" class="form-control" name="Address" value=""
                                        placeholder="Address" required>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group">
                                    <input type="description" class="form-control" name="description" value=""
                                        placeholder="Description" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 upload-property-button d-flex">
                                    <button onclick="window.location='{{route('user.dashboard')}}'" class="btn cst-res-button">Back</button>
                                    <button type="submit" class="btn cst-yellow-button">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        var count = 0;

        $(".add-file-input").click(function () {
            count++;

            // Create a new file input group
            var fileInput = '<div class="file-input-group">';
            fileInput += '<div class="d-flex">';
            fileInput += '<div style="" class="inner-upload-property  mx-2 preview-container" id="preview-container-' + count + '">';
            fileInput += '<input style="max-width: 72rem;padding-top: 2rem;" id="add-file-input-' + count + '" type="file" accept=".jpg, .jpeg, .png" class="hide-field" name="home_picture_input[]">';
            fileInput += '<img src="{{ asset("images/camera.png") }}">';
            fileInput += '<span>Add Property</span>';
            fileInput += '</div>';
            fileInput += '<button style="height: 2.2rem;" type="button" class="remove-file-input btn btn-danger">-</button>';
            fileInput += '</div>';
            fileInput += '</div>';

            // Append the new file input group to the container
            $("#file-input-container").append(fileInput);

            // Attach change event to the new file input
            attachChangeEvent(count);
        });

        $("#file-input-container").on('click', '.remove-file-input', function () {
            var clickedCount = $(this).closest('.file-input-group').find('input[type="file"]').attr('id').split('-')[3];
            var fileInputGroups = $("#file-input-container .file-input-group");

            // Remove the clicked file-input-group
            $(this).closest('.file-input-group').remove();

            // Remove the associated preview container
            $("#preview-container-" + clickedCount).remove();
        });

        function attachChangeEvent(currentCount) {
            $("#add-file-input-" + currentCount).change(function () {
                var formData = new FormData($("#upload-form")[0]);
                var files = this.files;

                // // Clear the existing previews in the container
                // $("#preview-container-" + currentCount).empty();

                for (var i = 0; i < files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        // Create a new preview
                        var previewDiv = $('<div class="inner-upload-property mx-2 mt-5"><img class="new-img" src="' + e.target.result + '" alt="Preview"></div>');
                        $("#preview-container-" + currentCount).append(previewDiv);
                    };
                    reader.readAsDataURL(files[i]);
                    formData.append('home_picture[]', files);
                }
            });
        }

        // Attach change event to the initial file input
        attachChangeEvent(count);
    });
</script>
@endsection
