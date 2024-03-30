@extends('layout.header')
@section('main')
<style>
    .new-css{
        padding: 15px;
    }
    .checkmark{
        background-color: rgb(180, 139, 82);
    height: 30px;
    width: 100%;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
    }
</style>
    <div class="main-wrapper">
        <div class="dashboard-page">
            <div class="dashboard-row d-flex">
                @include('layout.sidebarmanu')
                <div class="dashboard-column right-content">
                    <div class="top-header d-flex align-items-center">
                        <div class="top-title">
                            <h1>Edit Property</h1>
                        </div>
                        <div class="right-head-button d-flex align-items-center">
                            <div class="dropdown bell-dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <a class="btn golden-button">Add or Search Property</a>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('add.property') }}">Add Property</a></li>
                                    <li><a class="dropdown-item" href="{{ route('search.property') }}">Search Property</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dashbaord-banner"></div>
                    <div class="dashboard-content">
                        <div class="add-properties">
                            <div class="upload-property">
                                @php
                                    $images = json_decode($property['images']);
                                @endphp
                                <div class="row justify-content-between" >
                                    @foreach($images as $image)
                                        <div class="col-md-2 image-container mt-2">
                                            <input type="hidden" name="selected_images[]" value="{{ $image }}">
                                            <div class="inner-upload-property mx-2 new-css">
                                                @if(str_contains($image, 'https'))
                                                    <img src="{{ $image }}" alt="{{ $image }}" class="selectable-image">
                                                @else
                                                    <img src="{{ asset('/ProfilePicture/'. $image ) ?? ''}}" alt="{{ $image }}" class="selectable-image">
                                                @endif
                                                <div class="checkmark">&#10004;</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="preview-container d-flex flex-row"></div>
                            <form action="{{ route('update.property') }}" method="post" enctype="multipart/form-data" class="upload-property-form" id="upload-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <label>Choose new Profile Picture</label>
                                        <div id="file-input-container">
                                            <input type="hidden" name="selected_images" id="selected-images-input" value="{{ is_array($images) ? implode(',', $images) : ($images ?? '') }}">
                                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                                            <div class="d-flex" id="image-container">
                                                <div class="inner-upload-property mx-2" id="preview-container-0">
                                                    <input type="file" class="hide-field" accept="image/*" id="home-picture-input" name="home_picture_input[]" multiple="multiple">
                                                    <img src="{{ asset('images/camera.png') }}">
                                                    <span>Add Property</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <input type="text" class="form-control" name="price" value="{{ $property->price ?? '' }}" placeholder="price">
                                    </div>
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <input type="text" class="form-control" name="home_type" value="{{ $property->home_type ?? '' }}" placeholder="Home type">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <input type="text" class="form-control" name="build_year" value="{{ $property->year_building ?? '' }}" placeholder="Build Year">
                                    </div>
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <input type="text" class="form-control" name="facts" value="{{ $property->facts ?? '' }}" placeholder="Facts">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <input type="address" class="form-control" name="Address" value="{{ $property->address ?? '' }}" placeholder="Address">
                                    </div>
                                    <div class="col-lg-6 col-md-6 form-group">
                                        <input type="description" class="form-control" name="description" value="{{ $property->description ?? '' }}" placeholder="Description">
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
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            var selectedImages = {!! json_encode($images) !!}; // Initialize selected images from PHP variable
            var selectedImagesInput = $('#selected-images-input');

            // Handle image click event
            $('.selectable-image').click(function () {
                var imageName = $(this).attr('alt');
                var checkmark = $(this).siblings('.checkmark');

                // Toggle selection
                if ($(this).hasClass('selected')) {
                    // If already selected, remove from the array, remove the 'selected' class, and hide the checkmark
                    selectedImages = selectedImages.filter(item => item !== imageName);
                    $(this).removeClass('selected');
                    checkmark.hide();
                } else {
                    // If not selected, add to the array, add the 'selected' class, and show the checkmark
                    selectedImages.push(imageName);
                    $(this).addClass('selected');
                    checkmark.show();
                }

                // Update the value of the hidden input field
                selectedImagesInput.val(selectedImages.join(','));

                console.log(selectedImages); // You can remove this line; it's just for testing
            });

            // Handle file input change event
            $('#home-picture-input').on('change', function() {
                var files = $(this)[0].files;
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var image = e.target.result;
                        selectedImages.push(image);
                        appendPreview(image);
                    }
                    reader.readAsDataURL(file);
                }
                selectedImagesInput.val(selectedImages.join(','));
            });

            // Function to append preview
            function appendPreview(image) {
                var previewContainer = $('<div class="inner-upload-property mx-2"></div>');
                var imgElement = $('<img class="selectable-image selected" src="' + image + '" alt="New Image">');
                var checkmark = $('<div class="checkmark">&#10004;</div>');

                // Add event listener to toggle selection
                imgElement.click(function() {
                    var imageName = $(this).attr('alt');
                    var index = selectedImages.indexOf(imageName);
                    if (index !== -1) {
                        selectedImages.splice(index, 1);
                        $(this).remove();
                        checkmark.remove();
                        selectedImagesInput.val(selectedImages.join(','));
                    }
                });

                previewContainer.append(imgElement);
                previewContainer.append(checkmark);
                $('.preview-container').append(previewContainer);
            }

            $(".add-file-input").click(function() {
                var fileInput = '<div class="file-input-group">';
                fileInput += '<input type="file" accept=".jpg, .jpeg, .png" class="form-control" name="home_picture_input[]">';
                fileInput += '</div>';
                $("#file-input-container").append(fileInput);
            });

            // Remove file input field
            $(".remove-file-input").click(function() {
                var fileInputGroups = $("#file-input-container .file-input-group");

                if (fileInputGroups.length > 0) {
                    // Remove the last file-input-group
                    fileInputGroups.last().remove();
                } else {
                    alert("You must have at least one file input.");
                }
            });
        });
    </script>
@endsection
