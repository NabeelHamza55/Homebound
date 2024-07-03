<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book Preview Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <style>
        .slide img {
            height: 40vh;
        }

        .add-to-cart-button:hover {
            color: white;
            background-color: #b48b52;
        }

        .back-button:hover {
            color: white;
        }

        .home-button:hover {
            color: white;
        }

        .social-button:hover {
            color: white;
        }
    </style>
</head>

<body>
    <section class="main-header">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header logo">
                    <a class="navbar-brand" href="{{ route('user.dashboard') }}"><img
                            src="{{ asset('images/logo.png') }}"></a>
                </div>
                <div class="nav navbar-nav header-buttons">
                    <a href="" class="back-button">Back</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="add-to-cart-button">Add to Cart</a>
                    <a href="{{ route('user.dashboard') }}" class="home-button">Home</a>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div style="top: 14.5rem;" class="modal-content">
                        <div class="modal-body text-center">
                            <h4 class="text-center">Congratulations 🎉</h4>
                            <p class="pb-3">Congratulations on completing your book! Secure your item now and
                                experience the joy! Happy shopping! 🛒🎉</p>
                            <a id="add_to_cart" href="{{ route('add.to.cart.item', $book->id) }}"
                                class="social-button mt-5">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>

        </nav>
    </section>
    <section class="image-section">
        <div class="owl-carousel owl-theme image-slide1">
            @if (isset($book['front_page']))
                @if (str_contains($book['front_page'], 'https'))
                    <div class="slide"><img src="{{ $book['front_page'] }}" alt="Front Side">
                        <p>Front Side</p>
                    </div>
                @endif
            @endif

            @if (isset($book['spine_page']))
                @if (str_contains($book['spine_page'], 'https'))
                    <div class="slide"><img src="{{ $book['spine_page'] }}" alt="Spine Side">
                        <p>Spine Side</p>
                    </div>
                @endif
            @endif

            @if (isset($book['back_page']))
                @if (str_contains($book['back_page'], 'https'))
                    <div class="slide"><img src="{{ $book['back_page'] }}" alt="Back Side">
                        <p>Back Side</p>
                    </div>
                @endif
            @endif

            @if (isset($book['inner_pages']))
                @php
                    $images = json_decode($book['inner_pages']);
                @endphp
                @foreach ($images as $image)
                    @if (str_contains($image, 'https'))
                        <div class="slide"><img src="{{ $image }}" alt="{{ $image }}">
                            <p>Inner pages</p>
                        </div>
                    @else
                        <div class="slide"><img src="{{ asset('ProfilePicture/' . $image) }}"
                                alt="{{ $image }}">
                            <p>Inner pages</p>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('.owl-carousel.image-slide1').owlCarousel({
                loop: true,
                margin: 10,
                navigation: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        })
    </script>
</body>

</html>
