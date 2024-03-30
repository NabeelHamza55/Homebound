@extends('layout.header')
@section('main')
    <style>
        /* Add this CSS to your existing stylesheet or create a new one */
        .loader-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
        }

        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <div class="main-wrapper">
        <div class="dashboard-page">
            <div class="dashboard-row d-flex">
                @include('layout.sidebarmanu')
                <div class="dashboard-column right-content">
                    <div class="top-header d-flex align-items-center">
                        <div class="top-title">
                            <h1>Search Property</h1>
                        </div>
                        <div class="right-head-button d-flex align-items-center">
                            {{--                            <a href="" class="btn golden-button">Add or Search Property</a>--}}
                            <div class="dropdown bell-dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{--                                    <i class="bell-icon"></i>--}}
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
                        <div class="dashboard-search">
                            <form class="search-form" action="{{ route('zillow.search.property') }}" method="GET">
                                @csrf
                                <input type="text" class="form-control" placeholder="Enter an Address, Neighborhood, City, or Zip Code" name="search">
                                <button type="submit" class="btn search-button golden-button">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="dashboard-content">
                        <div class="row d-flex">
                            <!-- resources/views/property-card.blade.php -->
                            <div class="col-6 d-flex align-items-center">
                                <div class="counter-text">
                                </div>
                                <div class="col-6 px-2">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="loader-container" style="display:none;">
                        <div class="loader"></div>
                    </div>


                    <div id="data" class="row">
                        <div class="col-lg-6"><img id="card-image" class="img-fluid" src="" alt="Property Photo">
                        </div>
                        <form action="{{ route('save.property.data') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" id="imagesArr" name="imagesArr[]" value="">

                            <div class="col-lg-6">
                                <h4>price</h4>
                                <input class="form-control" type="text" name="price" value="">
                                <h4>Year Built</h4>
                                <input class="form-control" type="text" name="year_building" value="">
                                <h4>Home Type</h4>
                                <input class="form-control" type="text" name="home_type" value="">
                                <h4>Facts</h4>
                                <input class="form-control" type="text" name="facts" value="">
                                <h4>Address</h4>
                                <input class="form-control" type="text" name="address" value="">
                                <h4>Description</h4>
                                <input class="form-control" type="text" name="description" value="">
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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                // Hide the 'data' div initially
                $('#data').hide();
                // Handle form submission
                $('.search-form').submit(function(event) {
                    // Prevent the default form submission
                    event.preventDefault();
                    $('.loader-container').show();
                    // Get the form data
                    var formData = $(this).serialize();

                    // Make an AJAX request to your search endpoint
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'GET',
                        data: formData,
                        success: function(response) {
                            // Check if the response has the expected structure
                            if (response.statusCode === 200) {
                                $('.loader-container').hide();                                // Render the data within the form
                                $('[name="price"]').val(response.price);
                                $('[name="year_building"]').val(response.yearBuilt);
                                $('[name="home_type"]').val(response.homeType);
                                $('[name="facts"]').val('heating, ' + response.atAGlanceFacts.Heating + ' cooling, ' + response.atAGlanceFacts.Cooling + ' parking, ' + response.atAGlanceFacts.Parking);
                                $('[name="address"]').val(response.address);
                                $('[name="description"]').val(response.description);
                                $('#card-image').attr('src', response.url[1]);
                                $('#imagesArr').val(response.url);

                                // Render images
                                var imagesHtml = '';
                                $.each(response.url, function(index, imageUrl) {
                                    imagesHtml += '<input type="hidden" name="imagesArr[]" value="' + imageUrl + '">';
                                });
                                // $('#data').html(imagesHtml);

                                // Show the 'data' div
                                $('#data').show();
                            } else {
                                // Handle the case when the search is unsuccessful
                                console.error('Search failed:', response);
                            }
                        },
                        error: function(error) {
                            $('.loader-container').hide();
                            // Handle AJAX error
                            console.error('AJAX error:', error);
                        }
                    });
                });

                // Handle save property form submission
                $('.save-property-form').submit(function(event) {
                    // Prevent the default form submission
                    event.preventDefault();

                    // Get the form data for saving property
                    var saveFormData = $(this).serialize();

                    // Make an AJAX request to save property endpoint
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: saveFormData,
                        success: function(saveResponse) {
                            // Handle the save property success case
                            console.log('Property saved successfully:', saveResponse);
                        },
                        error: function(saveError) {
                            // Handle save property AJAX error
                            console.error('Save property failed:', saveError);
                        }
                    });
                });
            });
        </script>
@endsection
