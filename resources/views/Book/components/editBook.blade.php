@extends('layout.header')
@include('Book.layout.navbar')
@section('main')
 <style>
        .text-big {
            font-size: 2rem;
            font-weight: bold
        }
        .img-box{
    padding: 200px;
    border: 1px solid rgb(72, 70, 70) !important;
    background-color: white;
    border-radius: 12px;
}
    </style>
    <section class="image-cont-sec">
        <div class="left-sidebar"style="    height: 250vh;
        flex-wrap: wrap;
        display: flex;
        overflow: auto;
     " ondragstart="drag(event)">
            @foreach($books as $book)
                @foreach(json_decode($book['images']) as $image)
                    @if(str_contains($image, 'https'))
                        <img src="{{ $image }}" alt="no image" class="selectable-image" draggable="true" ondragstart="drag(event)" data-image="{{ $image }}">
                    @else
                        <img src="{{ asset('/ProfilePicture/'.$image) }}" alt="no image" class="selectable-image" draggable="true" ondragstart="drag(event)" data-image="{{ $image }}">
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="right-sidebar" style="    height: 250vh;
        flex-wrap: wrap;
        display: flex;
        overflow: auto;
     " ondrop="drop(event)" ondragover="allowDrop(event)">
            <label>Front page</label>
            <div id="front" class='img-box data-drop-target="front_page">

            </div>
            <label>Spine page</label>
            <div id="spine" class='img-box' data-drop-target="spine_page">

            </div>
            <label>Back page</label>
            <div id="back" class='img-box' data-drop-target="back_page">

            </div>
            <h2>Create Inner Pages</h2>
            <div id="inner" class='img-box'   data-drop-target="inner_page">

            </div>
            <form id="bookForm" method="post" action="{{ route('update.book') }}" enctype="multipart/form-data">
                @csrf
                <input name="front_page" id="front_page" type="hidden">
                <input name="spine_page" id="spine_page" type="hidden">
                <input name="back_page" id="back_page" type="hidden">
                <input name="inner_page[]" id="inner_page" type="hidden">
                <div class="col-lg-6 col-md-6 mt-5 form-group">
                    <input type="text" class="form-control" name="title" value="" placeholder="Enter the title of Book">
                </div>
                <div class="col-lg-6 col-md-6 mt-5 form-group">
                    <input type="text" class="form-control" name="unit_price" value="" placeholder="Enter the unit price">
                </div>

                <input name="book_id" id="inner_page" type="hidden" value="{{$bookData->id}}">
                <!-- Input elements for file upload -->
                <label for="front_page_upload">Upload Front Page:</label>
                <input class='form-control' type="file" id="front_page_upload" name="front_page_upload" accept="image/*" onchange="handleFileUpload('front_page_upload', 'front')">


                <label for="back_page_upload">Upload Back Page:</label>
                <input class='form-control' type="file" id="back_page_upload" name="back_page_upload" accept="image/*" onchange="handleFileUpload('back_page_upload', 'back')">

                <label for="spine_page_upload">Upload Spine Page:</label>
                <input class='form-control' type="file" id="spine_page_upload" name="spine_page_upload" accept="image/*" onchange="handleFileUpload('spine_page_upload', 'spine')">

                    <label for="inner_page_upload">Upload Inner Page:</label>
                    <input  class='form-control' type="file" id="inner_page_upload" name="inner_page_upload[]" accept="image/*" onchange="handleFileUpload('inner_page_upload', 'inner')">
                <div class="row">
                    <div class="row">
                        <div class="col-lg-12 upload-property-button d-flex">
                            <button type="button" class="btn cst-res-button" onclick="goBack()">Back</button>
                            <button type="button" id="myButton" class="btn cst-yellow-button">Save</button>
                        </div>
                    </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            function handleFileUpload(inputId, dropTarget) {
                var input = document.getElementById(inputId);
                var files = input.files;
                if (dropTarget === 'inner') {
                    var reader;
                    for (var i = 0; i < files.length; i++) {
                        reader = new FileReader();
                        reader.onload = function (e) {
                            var imageUrl = e.target.result;

                            // Display the uploaded image in the right sidebar
                            var img = $("<img>", {
                                src: imageUrl,
                                alt: 'no image',
                                class: 'selectable-image',
                                'data-image': imageUrl
                            });

                            // Add a close button to remove the image
                            var closeButton = $("<button>", {
                                html: 'Remove',
                                click: function () {
                                    img.remove();
                                    closeButton.remove(); // Remove the button as well
                                    updateHiddenInput(dropTarget);
                                }
                              }).addClass("btn btn-danger");

                            // Append the image and close button without clearing existing content
                            $("#" + dropTarget).append(img);
                            $("#" + dropTarget).append(closeButton);

                            // Set the value of the hidden input field in the form
                            updateHiddenInput(dropTarget, imageUrl);
                        };

                        if (files[i]) {
                            reader.readAsDataURL(files[i]);
                        }
                    }

                } else {
                    // Logic for handling other drop targets (replace image if it already exists)
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var imageUrl = e.target.result;

                        // Display the uploaded image in the right sidebar
                        var img = $("<img>", {
                            src: imageUrl,
                            alt: 'no image',
                            class: 'selectable-image',
                            'data-image': imageUrl
                        });

                        // Add a close button to remove the image
                        var closeButton = $("<button>", {
                            html: 'Remove',
                            click: function () {
                                img.remove();
                                closeButton.remove(); // Remove the button as well
                                updateHiddenInput(dropTarget);
                            }
                       }).addClass("btn btn-danger");

                        // Replace the existing content with the new image and close button
                        $("#" + dropTarget).empty();
                        $("#" + dropTarget).append(img);
                        $("#" + dropTarget).append(closeButton);

                        // Set the value of the hidden input field in the form
                        updateHiddenInput(dropTarget, imageUrl);
                    };

                    if (files[0]) {
                        reader.readAsDataURL(files[0]);
                    }
                }
            }

            function readyData(dropTarget , imageUrl )
            {
                if (dropTarget == 'inner_page') {
                    drop = dropTarget.replace('_page', ''); // Remove "_page" from the string

                    var droppedImagesContainer = $("#" + drop);
                    // Display the dropped image in the right sidebar
                    var img = $("<img>", {
                        src: imageUrl,
                        alt: 'no image',
                        class: 'selectable-image',
                        'data-image': imageUrl
                    });

                    // Add a close button to remove the image
                    var closeButton = $("<button>", {
                        html: 'Remove',
                        click: function () {
                            img.remove();
                            closeButton.remove(); // Remove the button as well
                            updateHiddenInput(drop);
                        }
                      }).addClass("btn btn-danger");

                    droppedImagesContainer.append(img);
                    droppedImagesContainer.append(closeButton);

                    // Set the value of the hidden input field in the form
                    updateHiddenInput(drop);
                } else {
                    // Remove "_page" from the string
                    drop = dropTarget.replace('_page', '');

                    var droppedImagesContainer = $("#" + drop);
                    // Check if there is an existing image
                    var existingImage = $("#" + drop + " img");

                    // Display the dropped image in the right sidebar
                    var img = $("<img>", {
                        src: imageUrl,
                        alt: 'no image',
                        class: 'selectable-image',
                        'data-image': imageUrl
                    });

                    // Add a close button to remove the image
                    var closeButton = $("<button>", {
                        html: 'Remove',
                        click: function () {
                            img.remove();
                            closeButton.remove(); // Remove the button as well
                            updateHiddenInput(drop);
                        }
                      }).addClass("btn btn-danger");

                    // If there is an existing image, replace it; otherwise, add the new image
                    if (existingImage.length > 0) {
                        existingImage.replaceWith(img);
                    } else {
                        droppedImagesContainer.append(img);
                        droppedImagesContainer.append(closeButton);
                    }

                    // Set the value of the hidden input field in the form
                    updateHiddenInput(drop, imageUrl);
                }
            }
            function updateHiddenInput(dropTarget, imageUrl) {
                // Update the value of the hidden input field based on the images in the container
                var images = $("#" + dropTarget + "_page").val().split(',');

                // Add the new image URL to the array
                images.push(imageUrl);

                // Update the hidden input value
                $("#" + dropTarget + "_page").val(images.join(','));
            }
            $(document).ready(function () {
                function allowDrop(event) {
                    event.preventDefault();
                }
                function drag(event) {
                    event.dataTransfer.setData("text", $(event.target).data("image"));
                }

                function drop(event) {
                    debugger;
                    event.preventDefault();
                    var imageUrl = event.originalEvent.dataTransfer.getData("text");

                    // Determine the dropped container based on the data-drop-target attribute
                    var dropTarget = $(event.target).data("drop-target");

                    if (dropTarget == 'inner_page') {
                        drop = dropTarget.replace('_page', ''); // Remove "_page" from the string

                        var droppedImagesContainer = $("#" + drop);
                        // Display the dropped image in the right sidebar
                        var img = $("<img>", {
                            src: imageUrl,
                            alt: 'no image',
                            class: 'selectable-image',
                            'data-image': imageUrl
                        });

                        // Add a close button to remove the image
                        var closeButton = $("<button>", {
                            html: 'Remove',
                            click: function () {
                                img.remove();
                                closeButton.remove(); // Remove the button as well
                                updateHiddenInput(drop);
                            }
                       }).addClass("btn btn-danger");

                        droppedImagesContainer.append(img);
                        droppedImagesContainer.append(closeButton);

                        // Set the value of the hidden input field in the form
                        updateHiddenInput(drop);
                    } else {
                        // Remove "_page" from the string
                        drop = dropTarget.replace('_page', '');

                        var droppedImagesContainer = $("#" + drop);
                        // Check if there is an existing image
                        var existingImage = $("#" + drop + " img");

                        // Display the dropped image in the right sidebar
                        var img = $("<img>", {
                            src: imageUrl,
                            alt: 'no image',
                            class: 'selectable-image',
                            'data-image': imageUrl
                        });

                        // Add a close button to remove the image
                        var closeButton = $("<button>", {
                            html: 'Remove',
                            click: function () {
                                img.remove();
                                closeButton.remove(); // Remove the button as well
                                updateHiddenInput(drop);
                            }
                         }).addClass("btn btn-danger");

                        // If there is an existing image, replace it; otherwise, add the new image
                        if (existingImage.length > 0) {
                            existingImage.replaceWith(img);
                        } else {
                            droppedImagesContainer.append(img);
                            droppedImagesContainer.append(closeButton);
                        }

                        // Set the value of the hidden input field in the form
                        updateHiddenInput(drop, imageUrl);
                    }
                }

                function updateHiddenInput(dropTarget) {
                    // Update the value of the hidden input field based on the images in the container
                    var images = $("#" + dropTarget + " img").map(function () {
                        return $(this).data('image');
                    }).get();

                    $("#" + dropTarget + "_page").val(images.join('*'));
                }

                function goBack() {
                    window.history.back();
                }
                $("#myButton").click(function () {
                    updateHiddenInput('front');
                    updateHiddenInput('spine');
                    updateHiddenInput('back');
                    updateHiddenInput('inner');
                    // Submit the form
                    $('#bookForm').submit();
                });

                // Attach events using jQuery
                $('.right-sidebar').on('drop', drop).on('dragover', allowDrop);
                @if(isset($bookData['front_page']))
                var image = '{{ $bookData['front_page'] }}';
                var imageUrlInner = '{{ asset("/ProfilePicture") }}' + '/' + image;
                if (imageUrlInner.indexOf('https') !== -1) {
                    imageUrlInner = '{{ $bookData['front_page'] }}';
                }
                var dropTargetInner = 'front_page';
                readyData(dropTargetInner, imageUrlInner);
                @endif
                @if(isset($bookData['spine_page']))
                var image = '{{ $bookData['spine_page'] }}';
                var imageUrlInner = '{{ asset("/ProfilePicture") }}' + '/' + image;
                if (imageUrlInner.indexOf('https') !== -1) {
                    imageUrlInner = '{{ $bookData['spine_page'] }}';
                }
                var dropTargetInner = 'spine_page';
                readyData(dropTargetInner, imageUrlInner);
                @endif
                @if(isset($bookData['back_page']))
                var image = '{{ $bookData['back_page'] }}';
                var imageUrlInner = '{{ asset("/ProfilePicture") }}' + '/' + image;
                if (imageUrlInner.indexOf('https') !== -1) {
                    imageUrlInner = '{{ $bookData['back_page'] }}';
                }
                var dropTargetInner = 'back_page';
                readyData(dropTargetInner, imageUrlInner);
                    @endif
                @if(isset($bookData['inner_pages']))
                    var images = {!! json_encode(json_decode($bookData['inner_pages'])) !!};
                images.forEach(function(image) {
                    $image = image;
                    if ($image.includes('https')) {
                        var imageUrlInner = $image;
                    } else {
                        var imageUrlInner = '{{ asset("/ProfilePicture/") }}' + '/' + $image;
                    }
                    var dropTargetInner = 'inner_page';
                    readyData(dropTargetInner, imageUrlInner);
                });

            {{--var images = {!! json_encode(json_decode($bookData['inner_pages'])) !!};--}}
                {{--images.forEach(function(image) {--}}
                {{--    $image = image ;--}}

                {{--    @if(str_contains($image, 'https'))--}}
                {{--    var imageUrlInner = image;--}}
                {{--    console.log("inner pages");--}}
                {{--    console.log(imageUrlInner)--}}
                {{--    @else--}}
                {{--    console.log("profile");--}}

                {{--    var imageUrlInner = '{{ asset("/ProfilePicture/$image") }}';--}}
                {{--    @endif--}}
                {{--    var dropTargetInner = 'inner_page';--}}
                {{--    readyData(dropTargetInner, imageUrlInner);--}}
                {{--});--}}
                @endif
{{--                @if(isset($bookData['inner_pages']))--}}
{{--                var images = {!! json_encode(json_decode($bookData['inner_pages'])) !!};--}}
{{--                images.forEach(function(image) {--}}
{{--                    var imageUrlInner = '{{ asset("/ProfilePicture") }}' + '/' + image;--}}
{{--                    if (imageUrlInner.indexOf('https') !== -1) {--}}
{{--                        imageUrlInner = '{{ $image }}';--}}
{{--                    }--}}
{{--                    var dropTargetInner = 'inner_page';--}}
{{--                    readyData(dropTargetInner, imageUrlInner);--}}
{{--                });--}}
{{--                @endif--}}
            });

        </script>
    </section>



@endsection
