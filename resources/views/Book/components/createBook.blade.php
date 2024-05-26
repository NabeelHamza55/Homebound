@extends('layout.header')
@section('main')
    <style>
        .text-big {
            font-size: 2rem;
            font-weight: bold
        }

        .img-box {
            padding-left: 14rem;
            padding-bottom: 1rem;
            border: 1px solid rgb(213 206 206) !important;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
        }

        .img-box img {
            /*height: 25rem;*/
        }

        .left-sidebar img {
            height: 13rem;
        }

        .extra {
            width: 75%;
            padding: 15vh 0;
            margin: auto;
        }

        .text-big {
            color: #b88e53;

            font-size: 1.2rem !important;
        }

        .selectable-image {
            border-radius: 12px;

        }

        .img-box c_i_h {
            border: 5px solid #e9eaee;
        }

        .add-to-cart-button {
            background: #fff;
            color: #000;
            border: 1px solid #B48B52 !important;
            padding: 0.7rem 1.5rem;
            border-radius: 9px;
        }

        .add-to-cart-button:hover {
            cursor: pointer;

        }

        .back-button:hover {
            color: white !important;
        }

        .home-button:hover {
            color: white !important;
        }

        .vertical-text {
            writing-mode: vertical-rl;
            /* Vertical writing mode, right-to-left */
            transform: rotate(180deg);
            /* Rotate by 180 degrees to flip it right-side-up */
        }

     .c_i_h img {
    height: 100% !important;
    width: 100% !important;
    border-radius: 9px !important;
}
    </style>
    <section class="main-header">
        <nav class="navbar">
            <div class="container-fluid" style="background-color: white !important;">
                <div class="navbar-header logo">
                    <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}"></a>
                </div>
                <div class="nav navbar-nav header-buttons">
                    <a id="preview" class="back-button">Preview book</a>
                    <button class="add-to-cart-button" id="back-button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" disabled>Add To Cart</button>
                    <a href="{{ route('user.dashboard') }}" class="home-button">Home</a>
                </div>
                <!-- Modal -->
                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h4 class="text-center">Congratulations 🎉</h4>
                                <p class="pb-3">Congratulations on completing your book! Secure your item now and
                                    experience the joy! Happy shopping! 🛒🎉</p>
                                <a id="add_to_cart" class="social-button mt-5" disabled>Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <section class="image-cont-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-sidebar"
                        style="    height: 250vh;
                       flex-wrap: wrap;
                        overflow: auto;
                         width: 65vh;"
                        ondragstart="drag(event)">
                        @foreach ($books as $book)
                            @foreach (json_decode($book['images']) as $image)
                                @if (str_contains($image, 'https'))
                                    <img src="{{ $image }}" alt="no image" class="selectable-image img-side"
                                        draggable="true" ondragstart="drag(event)" data-image="{{ $image }}">
                                @else
                                    <img src="{{ asset('/ProfilePicture/' . $image) }}" alt="no image"
                                        class="selectable-image" draggable="true" ondragstart="drag(event)"
                                        data-image="{{ $image }}">
                                @endif
                            @endforeach
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="container p-0">
            <div class="right-sidebar" style="
    overflow-x: hidden;ondrop="drop(event)" ondragover="allowDrop(event)">

                <div class=" d-flex row justify-content-center">

                    <div class="col-md-6 ">
                        <div style="padding-left: 0.0001rem;padding-bottom:0;height: 16rem; background-color: #04374b; border: 6px solid #e9eaee;border-radius: 10px;"
                            class="img-box c_i_h" id="front" data-drop-target="front_page">
                            <img src="{{ asset('book/front.jpg') }}" alt="">
                            {{-- <span
                                style="display: flex;justify-content: center;
                         align-items: center;    align-items: center;
                         position: relative;
                         margin: auto;
                          top: 6rem; color:#ffff">Front
                          page</span> --}}
                        </div>

                    </div>

                    <!--border: 5px solid #e9eaee;-->
                    <div style="" class="col-md-6   ">
                        <div class="p-0 c_i_h"
                            style="margin-left: 0rem;padding-left: 0.000;padding-bottom: 2rem;height: 16rem;   background-color: #b48b53; border-radius: 0px;border-radius: 10px;"
                            class="img-box" id="back" data-drop-target="back_page">
                            <img src="{{ asset('book/back.jpg') }}" alt="">
                            {{-- <span
                                style="display: flex;justify-content: center;
                            align-items: center;    align-items: center;
                            position: relative;
                            margin: auto;
                             top: 6rem; color:#ffff">Back
                                page</span> --}}
                        </div>
                    </div>


                    <!--jawad Habib-->
                    <div style="border: 7px solid
                    #e9eaee; border-radius: 14px; background-color: #fff9ed;border-radius: 16px;"
                        class=" col-md-6 text-center mt-4"> <span style="font-size: 12px;">
                            <input style="border: none;
    background: none; padding: 0px;" type="text"
                                class="form-control text-center" name="title" value=""
                                placeholder="Enter the title of Book"></span>
                    </div>

                    <div class="mt-4">
                        <h4 style="color: #af8647;">Create Inner Page</h4>
                    </div>


                    <!--<div style="border: 5px solid-->
 <!--                   #e9eaee; border-radius: 1px; width: 4.333333%; background-color: #fff9ed"-->
                    <!--                       class="col-md-7 p-0 ">-->
                    <!--                       <div style="margin-left: 0rem;padding-left: 0.0001rem;padding-bottom: 2rem; width:rem; border-radius: 0px"-->
                    <!--                           class="img-box" id="spine" data-drop-target="spine_page">-->
                    <!--                           <span-->
                    <!--                               style="position: relative;    font-size: 11px;-->
 <!--                       left: 3px;-->
 <!--                       top: 9rem;"-->
                    <!--                               class="vertical-text">Spine page</span>-->
                    <!--                       </div>-->

                    <!--                   </div>-->
                    {{-- <label class="text-big"></label> --}}
                    <!--</div>-->
                    <!--<div class="col-md-2"></div>-->

                </div>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div style="padding-left: 0.0001rem;padding-bottom: 2rem;height: 16rem;" class="img-box"
                            id="inner1" data-drop-target="inner1_page"></div><label class="text-big"></label>
                    </div>
                    <div class="col-md-6 ">
                        <div style="margin-left: 0rem;padding-left: 0.0001rem;padding-bottom: 2rem;height: 16rem;"
                            class="img-box" id="inner2" data-drop-target="inner2_page"></div> <label
                            class="text-big"></label>
                    </div>
                    <div class="col-md-6">
                        <div style="margin-left: 0rem;padding-left: 0.000;padding-bottom: 2rem;height: 16rem;"
                            class="img-box" id="inner3" data-drop-target="inner3_page"></div><label
                            class="text-big"></label>
                    </div>


                    <div class="col-md-6">
                        <div style="margin-left: 0rem;padding-left: 0.000;padding-bottom: 2rem;height: 16rem;"
                            class="img-box" id="inner4" data-drop-target="inner4_page"></div><label
                            class="text-big"></label>
                    </div>


                    <div class="col-md-6">
                        <div style="margin-left: 0rem;padding-left: 0.000;padding-bottom: 2rem;height: 16rem;"
                            class="img-box" id="inner5" data-drop-target="inner5_page"></div><label
                            class="text-big"></label>
                    </div>


                    <div class="col-md-6">
                        <div style="margin-left: 0rem;padding-left: 0.000;padding-bottom: 2rem;height: 16rem;"
                            class="img-box" id="inner6" data-drop-target="inner6_page"></div><label
                            class="text-big"></label>
                    </div>

                </div>
            </div>



            {{--        <h2 class='mt-5'>Create Inner Pages</h2> --}}
            {{--        <div class="img-box extra" id="inner"  data-drop-target="inner_page"></div> --}}
            <form id="bookForm">
                <input name="front_page" id="front_page" type="hidden">
                <input name="spine_page" id="spine_page" type="hidden">
                <input name="back_page" id="back_page" type="hidden">
                <input name="inner1" id="inner1_page" type="hidden">
                <input name="inner2" id="inner2_page" type="hidden">
                <input name="inner3" id="inner3_page" type="hidden">
                <input name="unit_price" value="10"type="hidden">

                <div class="col-lg-12 upload-property-button d-flex">
                    <button type="button" class="btn cst-res-button" onclick="goBack()">Back</button>
                    <button type="button" id="myButton" class="btn cst-yellow-button">Save</button>
                </div>
                {{-- </div> --}}
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
                        reader.onload = function(e) {
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
                                click: function() {
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
                    reader.onload = function(e) {
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
                            click: function() {
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


            function updateHiddenInput(dropTarget, imageUrl) {
                // Update the value of the hidden input field based on the images in the container
                var images = $("#" + dropTarget + "_page").val().split(',');

                // Add the new image URL to the array
                images.push(imageUrl);

                // Update the hidden input value
                $("#" + dropTarget + "_page").val(images.join(','));
            }
            $(document).ready(function() {
                $("#bookForm").submit(function(event) {
                    event.preventDefault(); // Prevent the default form submission

                    // Serialize form data
                    var formData = new FormData($(this)[0]);

                    // Get CSRF token from the meta tag
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    // Append CSRF token to the form data
                    formData.append('_token', csrfToken);

                    // Make AJAX call
                    $.ajax({
                        url: "{{ route('save.book') }}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            debugger;
                            var bookId = response.id;
                            $("#back-button").removeAttr("disabled");
                            $("#add_to_cart").attr("href", "{{ route('add.to.cart.item') }}/" +
                                bookId).removeAttr("disabled");
                            $("#preview").attr("href",
                                "{{ route('preview.book', ['id' => ':bookId']) }}".replace(
                                    ':bookId', bookId));
                            $("#myButton").hide();

                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            console.error(xhr.responseText);
                        }
                    });
                });

                function allowDrop(event) {
                    event.preventDefault();
                }

                function drag(event) {
                    event.dataTransfer.setData("text", $(event.target).data("image"));
                }

                function drop(event) {
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
                            click: function() {
                                img.remove();
                                closeButton.remove(); // Remove the button as well
                                updateHiddenInput(drop);
                            }
                        });

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
                            click: function() {
                                img.remove();
                                closeButton.remove(); // Remove the button as well
                                updateHiddenInput(drop);
                                // Show the text if there is no more image
                                if (!droppedImagesContainer.find('img').length) {
                                    $("#" + drop + " span").css('display', 'flex');
                                }
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

                        // Hide the "Front page" text when an image is inside the box
                        $("#" + drop + " span").css('display', 'none');
                    }
                }

                function drop(event) {
                    event.preventDefault();
                    var imageUrl = event.originalEvent.dataTransfer.getData("text");

                    // Determine the dropped container based on the data-drop-target attribute
                    var dropTarget = $(event.target).data("drop-target");

                    // Convert dropTarget to match the div's ID without the "_page" suffix
                    drop = dropTarget.replace('_page', '');

                    var droppedImagesContainer = $("#" + drop);

                    // Create an image element for the dropped image
                    var img = $("<img>", {
                        src: imageUrl,
                        alt: 'no image',
                        class: 'selectable-image',
                        'data-image': imageUrl
                    });

                    // Check if there is an existing image
                    var existingImage = $("#" + drop + " img");

                    // If there is an existing image, replace it; otherwise, add the new image
                    if (existingImage.length > 0) {
                        existingImage.replaceWith(img);
                    } else {
                        droppedImagesContainer.append(img);
                    }

                    // Set the value of the hidden input field in the form
                    updateHiddenInput(drop, imageUrl);

                    // Hide the text when an image is dropped into the box
                    $("#" + drop + " span").css('display', 'none');
                }

                function updateHiddenInput(dropTarget) {
                    // Update the value of the hidden input field based on the images in the container
                    var images = $("#" + dropTarget + " img").map(function() {
                        return $(this).data('image');
                    }).get();

                    $("#" + dropTarget + "_page").val(images.join('*'));
                }

                // Bind the drop function to the drop event on the right sidebar
                $('.right-sidebar').on('drop', drop).on('dragover', allowDrop);

                function updateHiddenInput(dropTarget) {
                    // Update the value of the hidden input field based on the images in the container
                    var images = $("#" + dropTarget + " img").map(function() {
                        return $(this).data('image');
                    }).get();

                    $("#" + dropTarget + "_page").val(images.join('*'));
                }

                function goBack() {
                    window.history.back();
                }

                function validateForm() {
                    var title = $("input[name='title']").val();
                    var unitPrice = $("input[name='unit_price']").val();

                    // Check if title and unitPrice are not empty
                    if (title.trim() === "" || unitPrice.trim() === "") {
                        alert("Please fill in all required fields.");
                        return false;
                    }

                    // Additional validation logic if needed

                    return true;
                }

                $("#myButton").on('click', function() {
                    // Update hidden inputs first
                    updateHiddenInput('front');
                    updateHiddenInput('spine');
                    updateHiddenInput('back');
                    updateHiddenInput('inner');

                    // Validate the form before submission
                    if (!validateForm()) {
                        return;
                    }

                    // Submit the form
                    $('#bookForm').submit();
                });

                $('.right-sidebar').on('drop', drop).on('dragover', allowDrop);
            });
        </script>





    </section>
@endsection
