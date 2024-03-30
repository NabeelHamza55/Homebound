@extends('landinglayouts.landing')
@section('main')
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->



    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{route('/')}}" class="logo">
                            <h1>HomeBound</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{route('/')}}" class="active">Home</a></li>
                            <li><a href="{{route('login')}}">Login</a></li>
                            <li><a href="{{route('create.registration')}}">Signup</a></li>
                            <li><a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner">
        <div class="owl-carousel owl-banner">
            <div class="item item-1">
                <div class="header-text">
                </div>
            </div>
            <div class="item item-2">
                <div class="header-text">
                </div>
            </div>
            <div class="item item-3">
                <div class="header-text">
                </div>
            </div>
        </div>
    </div>

    <div class="featured section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image">
                        <img src="assets/images/featured.jpg" alt="">
                        <a href="property-details.html"><img src="assets/images/featured-icon.png" alt=""
                                                             style="max-width: 60px; padding: 0px;"></a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h6>| Featured</h6>
                        <h2>Best Appartment &amp; Sea view</h2>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                    Best useful links ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Get <strong>the best villa</strong> website template in HTML CSS and Bootstrap for your business.
                                    TemplateMo provides you the <a href="https://www.google.com/search?q=best+free+css+templates"
                                                                   target="_blank">best free CSS templates</a> in the world. Please tell your friends about it.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How does this work ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor
                                    incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Why is Villa Agency the best ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor
                                    incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info-table">
                        <ul>
                            <li>
                                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                                <h4>250 m2<br><span>Total Flat Space</span></h4>
                            </li>
                            <li>
                                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                                <h4>Contract<br><span>Contract Ready</span></h4>
                            </li>
                            <li>
                                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                                <h4>Payment<br><span>Payment Process</span></h4>
                            </li>
                            <li>
                                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                                <h4>Safety<br><span>24/7 Under Control</span></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                                    <p class="count-text ">Buildings<br>Finished Now</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                                    <p class="count-text ">Years<br>Experience</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                                    <p class="count-text ">Awwards<br>Won 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section best-deal">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>| Best Deal</h6>
                        <h2>Find Your Best Deal Right Now!</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper ">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab"
                                                data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment"
                                                aria-selected="true">Appartment</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button"
                                                role="tab" aria-controls="villa" aria-selected="false">Villa House</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse"
                                                type="button" role="tab" aria-controls="penthouse" aria-selected="false">Penthouse</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>185 m2</span></li>
                                                    <li>Floor number <span>26th</span></li>
                                                    <li>Number of rooms <span>4</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="assets/images/deal-01.jpg" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Extra Info About Property</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut
                                                labore et dolore magna aliqua quised ipsum suspendisse.
                                                <br><br>When you need free CSS templates, you can simply type TemplateMo in any search engine
                                                website. In addition, you can type TemplateMo Portfolio, TemplateMo One Page Layouts, etc.
                                            </p>
                                            <div class="icon-button">
                                                <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>250 m2</span></li>
                                                    <li>Floor number <span>26th</span></li>
                                                    <li>Number of rooms <span>5</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="assets/images/deal-02.jpg" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Detail Info About Villa</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut
                                                labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee.
                                                JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo
                                                after messenger poutine next level humblebrag swag franzen.</p>
                                            <div class="icon-button">
                                                <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>320 m2</span></li>
                                                    <li>Floor number <span>34th</span></li>
                                                    <li>Number of rooms <span>6</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="assets/images/deal-03.jpg" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Extra Info About Penthouse</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut
                                                labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee.
                                                JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo
                                                after messenger poutine next level humblebrag swag franzen.</p>
                                            <div class="icon-button">
                                                <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="contact section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Contact Us</h6>
                        <h2>Get In Touch With Our Agents</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="col-lg-8">
                <p>Copyright © 2048 HouseBound Co., Ltd. All rights reserved.</p>
            </div>
        </div>
    </footer>
@endsection
