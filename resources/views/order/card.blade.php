@extends('layout.header')
<!--@include('Book.layout.navbar')-->
@section('main')
         <style>
        h1 {
            text-align: center;
        }

        h2 {
            margin: 0;
        }
        .span{
    border-right:1px solid white;
    margin-right:1rem;
}

        #multi-step-form-container {
            margin-top: 5rem;
        }

        .text-center {
            text-align: center;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .pl-0 {
            padding-left: 0;
        }

        .button {
            padding: 0.7rem 5.5rem;
            border: 1px solid #b48b52;
            background-color: #b48b52;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-danger{
            background-color:white !important;
            color: #dc3545;
    border-color: #dc3545;
        }
                .btn-danger:hover{
                    color:red !important;
                }

        .submit-btn {
            border: 1px solid #b48b52;
            background-color: #b48b52;
        }

        .mt-3 {
            margin-top: 2rem;
        }

        .d-none {
            display: none;
        }

        .form-step {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            padding: 3rem;
        }

        .font-normal {
            font-weight: normal;
        }

        ul.form-stepper {
            counter-reset: section;
            margin-bottom: 3rem;
                padding: 0 18rem;
        }

        ul.form-stepper .form-stepper-circle {
            position: relative;
        }

        ul.form-stepper .form-stepper-circle span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
        }

        .form-stepper-horizontal {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        ul.form-stepper>li:not(:last-of-type) {
            margin-bottom: 0.625rem;
            -webkit-transition: margin-bottom 0.4s;
            -o-transition: margin-bottom 0.4s;
            transition: margin-bottom 0.4s;
        }

        .form-stepper-horizontal>li:not(:last-of-type) {
            margin-bottom: 0 !important;
        }

        .form-stepper-horizontal li {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: start;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        .form-stepper-horizontal li:not(:last-child):after {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            height: 1px;
            content: "";
            top: 32%;
                padding: 3px;
        }

        .form-stepper-horizontal li:after {
            background-color: #dee2e6;
        }

        .form-stepper-horizontal li.form-stepper-completed:after {
            background-color: #b48b52;
        }

        .form-stepper-horizontal li:last-child {
            flex: unset;
        }

        ul.form-stepper li a .form-stepper-circle {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-right: 0;
            line-height: 1.7rem;
            text-align: center;
            background: rgba(0, 0, 0, 0.38);
            border-radius: 50%;
        }

        .form-stepper .form-stepper-active .form-stepper-circle {
            background-color: #b48b52 !important;
            color: #fff;
        }

        .form-stepper .form-stepper-active .label {
            color: #b48b52 !important;

        }

        .form-stepper .form-stepper-active .form-stepper-circle:hover {
            background-color: #b48b52 !important;
            color: #fff !important;
        }

        .form-stepper .form-stepper-unfinished .form-stepper-circle {
            background-color: #f8f7ff;
        }

        .form-stepper .form-stepper-completed .form-stepper-circle {
            background-color:   #b48b52 !important;
            color: #fff;
        }

        .form-stepper .form-stepper-completed .label {
            color: #b48b52 !important;
        }

        .form-stepper .form-stepper-completed .form-stepper-circle:hover {
            background-color: #b48b52 !important;
            color: #fff !important;
        }

        .form-stepper .form-stepper-active span.text-muted {
            color: #fff !important;
        }

        .form-stepper .form-stepper-completed span.text-muted {
            color: #fff !important;
        }

        .form-stepper .label {
            font-size: 1rem;
            margin-top: 0.5rem;
        }

        .form-stepper a {
            cursor: default;
        }
 .form-control {
    border-radius: 15px;
    border: 1px solid rgba(0, 0, 0, 0.20) !important;
    background: #FFF;
    height: 60px;
    padding: 0 15px;
}
    </style>
    <section class="add-cart-header">
        <div class="add-cart-text">
            <h3>Cart</h3>
            @if (\Session::has('error'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif
        </div>
        <div class="notification-icon">
          
            <img  src="{{ asset("images/bell-icon.png") }}">
        </div>
    </section>
    <section class="banner-img">
        <img   src="{{ asset("images/img18.png") }}" alt="">
    </section>
    <section class="cart-table-data">
        <!--<div id="page-wrap">-->
        <!--    <div id="tabs">-->
        <!--        <ul>-->
        <!--            <li class="step1 active-step"><a href="#fragment-1">1</a></li>-->
        <!--            <li class="step2"><a href="#fragment-2">2</a></li>-->
        <!--            <li class="step3"><a href="#fragment-3">3</a></li>-->
        <!--        </ul>-->
        <!--        <h3>Products Details</h3>-->
        <!--        <div id="fragment-1" class="ui-tabs-panel">-->
        <!--            <table>-->
        <!--                <tr class="first-row">-->
        <!--                    <th><input type="checkbox"></th>-->
        <!--                    <th width="30%" style="text-align: left;">Book List</th>-->
        <!--                    <th>Unit Price</th>-->
        <!--                    <th>Quantity</th>-->
        <!--                    <th>Total </th>-->
        <!--                </tr>-->
        <!--                @foreach($books as $book)-->
        <!--                    <tr>-->
        <!--                        <td><input type="checkbox" value="{{ $book['id'] }}" checked></td>-->
        <!--                        <td>-->
        <!--                            <div class="book-date">-->
        <!--                                @if($book['front_page'])-->
        <!--                                    @if(str_contains($book['front_page'], 'https'))-->
        <!--                                        <div class="book-image"><img src="{{ $book['front_page'] }}" alt="no image"></div>-->
        <!--                                    @else-->
        <!--                                        <div class="book-image"><img src="{{ asset('/ProfilePicture/'.$book['front_page']) }}" alt="no image"></div>-->
        <!--                                    @endif-->
        <!--                                @endif-->
        <!--                                @if($book['title'])-->
        <!--                                    <div class="book-text"><p>{{ $book['title'] }}</p></div>-->
        <!--                                @endif-->
        <!--                            </div>-->
        <!--                        </td>-->
        <!--                        @if($book['unit_price'])-->
        <!--                            <td><span class="xyz unit-price">{{ $book['unit_price'] }}</span></td>-->
        <!--                        @endif-->
        <!--                        <td>-->
        <!--                            <span class="cart-update">-->
        <!--                                <button class="decrement">-</button>-->
        <!--                                <span class="quantity">{{ $book['quantity'] }}</span>-->
        <!--                                <button class="increment">+</button>-->
        <!--                            </span>-->
        <!--                        </td>-->
        <!--                        <td><span class="xyz total-price">{{ $book['total_price'] }}</span></td>-->
        <!--                        <td><img src="images/trash-icon.png" alt=""></td>-->
        <!--                    </tr>-->
        <!--                @endforeach-->
        <!--            </table>-->
        <!--        </div>-->
        <!--        <form method="post" action="{{route('checkout.cart')}}" enctype="multipart/form-data">-->
        <!--            @csrf-->
        <!--            <input type="hidden" name="Books[]" value="">-->
        <!--            <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">-->
        <!--                <section class="billing-address">-->
        <!--                    <h4>Billing Address</h4>-->
        <!--                    <input type="text" placeholder="Type Here">-->
        <!--                </section>-->
        <!--                <section class="shipping-address">-->
        <!--                    <h4>Shipping Address</h4>-->
        <!--                    <input type="text" placeholder="Type Here">-->
        <!--                </section>-->
        <!--            </div>-->
        <!--            <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">-->
        <!--                <button href='#' class='next-tab mover' rel='" + next + "'>Checkout stripe</button>-->
        <!--            </div>-->
        <!--        </form>-->
        <!--    </div>-->
        <!--</div>-->
         <div>
        <div id="multi-step-form-container">
            <!-- Form Steps / Progress Bar -->
            <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                <!-- Step 1 -->
                <li class="form-stepper-active text-center form-stepper-list" step="1">
                    <a class="mx-2">
                        <span class="form-stepper-circle">
                            <span>1</span>
                        </span>
                        <div class="label ">Cart</div>
                    </a>
                </li>
                <!-- Step 2 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>2</span>
                        </span>
                        <div class="label text-muted">Address</div>
                    </a>
                </li>
                <!-- Step 3 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>3</span>
                        </span>
                        <div class="label text-muted">Payment</div>
                    </a>
                </li>
            </ul>
            <!-- Step Wise Form Content -->
                <!-- Step 1 Content -->
                <section id="step-1" class="form-step">
                    <h2 class="font-normal text-center">Product Details</h2>
                    <!-- Step 1 input fields -->
                    <div class="mt-3">
                        <table>
                        <tr style="height: 3.5rem;" class="first-row">
                            <th><input type="checkbox"></th>
                            <th width="30%" style="text-align: left;"><span class='span'></span> Book List</th>
                            <th  style="padding-bottom: 1rem;"> <span class='span'></span>Unit Price</th>
                            <th><span class='span'></span>Quantity</th>
                            <th><span class='span'></span>Total </th>
                
                        </tr>
                        @foreach($books as $book)
                            <tr  style="background-color: #f8f8f8;height: 6rem;">
                                <td><input type="checkbox" value="{{ $book['id'] }}" checked></td>
                                <td>
                                    <div class="book-date">
                                        @if($book['front_page'])
                                            @if(str_contains($book['front_page'], 'https'))
                                                <div class="book-image"><img style="width: ; border-radius: 4px;" src="{{ $book['front_page'] }}" alt="no image"></div>
                                            @else
                                                <div class="book-image"><img src="{{ asset('/ProfilePicture/'.$book['front_page']) }}" alt="no image"></div>
                                            @endif
                                        @endif
                                        @if($book['title'])
                                            <div class="book-text"><p>{{ $book['title'] }}</p></div>
                                        @endif
                                    </div>
                                </td>
                                @if($book['unit_price'])
                                    <td><span class="xyz unit-price">{{ $book['unit_price'] }}</span></td>
                                @endif
                                <td>
                                    <span class="cart-update">
                                        <button class="decrement">-</button>
                                        <span class="quantity">{{ $book['quantity'] }}</span>
                                        <button class="increment">+</button>
                                    </span>
                                </td>
                                <td><span class="xyz total-price">{{ $book['total_price'] }}</span></td>
                                <td><img src="images/trash-icon.png" alt=""></td>
                            </tr>
                        @endforeach
                    </table>
                    </div>
                    <div class="mt-3 text-end">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                    </div>
                </section>
                <!-- Step 2 Content, default hidden on page load. -->
                <section id="step-2" class="form-step d-none">
                    <h2 class="font-normal text-center">Address</h2>
                    <!-- Step 2 input fields -->
                   <div class="row">
    <div class="col-md-12">
        <section class="billing-address">
            <h4>Billing Address</h4>
            <input required class='form-control' type="text" placeholder="Type Here"style="background-color: #F8F8F8;">
        </section>
    </div>
    <div class="col-md-12">
        <section class="shipping-address">
            <h4>Shipping Address</h4>
            <input required class='form-control' type="text" placeholder="Type Here"style="background-color: #F8F8F8;">
        </section>
    </div>
</div>

                    <div class="mt-3 text-end">
                        <button class="button btn-navigate-form-step btn-danger" type="button" step_number="1">Back</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                    </div>
                </section>
                <!-- Step 3 Content, default hidden on page load. -->
            <form id="userAccountSetupForm" action="{{route('checkout.cart')}}" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">
                  @csrf
                <input type="hidden" name="Books[]" value="">
                <section id="step-3" class="form-step d-none">
                    <h2 class="font-normal text-center">Payment</h2>
                    <!-- Step 3 input fields -->
                    <div class="mt-3">
                        <h5>Enter Card Details</h5>
                            <div class="form-details">
                                <div class="form-rows">
                                    <div class="first-row-content">
                                        <label>Card Holder Name</label><br>
                                        <input class='form-control'  required type="text" placeholder="Enter Card Holder Name">
                                    </div>
                                    <div class="second-row-content">
                                        <label>Card Number</label><br>
                                        <input required class='form-control' type="text" placeholder="Enter Card Number">
                                    </div>
                                </div>
                                <div class="form-rows-remaining">
                                    <div class="third-row-content">
                                        <label>Card Holder Name</label><br>
                                        <input required class='form-control' type="date" placeholder="Enter Expiry DATE">
                                    </div>
                                    <div class="fourth-row-content">
                                        <label>Enter CVV Code</label><br>
                                        <input required class='form-control' type="text" placeholder="0000">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="mt-3 text-end">
                        <button class="button btn-navigate-form-step btn-danger" type="button" step_number="2">Back</button>
                        <button class="button submit-btn" type="submit">Save</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
    </section>
    
        <script type="text/javascript">
        $(function () {
            var $tabs = $('#tabs').tabs();
            $(".ui-tabs-panel").each(function (i) {
                var totalSize = $(".ui-tabs-panel").size() - 1;
                if (i != totalSize) {
                    next = i + 2;
                    $(this).append("<a href='#fragment-2' class='next-tab mover' rel='" + next + "'>Next</a>");
                }
                if (i != 0) {
                    prev = i;
                    $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'>Back</a>");
                }
            });

            function showTab(tabIndex) {
                $tabs.tabs('select', tabIndex);
                $('.fragment-2').show();
                $('.prev-tab').show();

                if (tabIndex === totalSize) {
                    $('.next-tab').hide();
                } else if (tabIndex === 0) {
                    $('.prev-tab').hide();
                }
            }

            $('.next-tab').click(function () {
                var currentIndex = $tabs.tabs('option', 'active');
                showTab(currentIndex + 1);
            });

            $('.prev-tab').click(function () {
                var currentIndex = $tabs.tabs('option', 'active');
                showTab(currentIndex - 1);
            });

            function updateSelectedBooks() {
                var selectedBooks = [];
                $('input[type="checkbox"]:checked').each(function () {
                    var bookId = $(this).val();
                    var quantity = parseInt($(this).closest('tr').find('.quantity').text());
                    selectedBooks.push({ bookId: bookId, quantity: quantity });
                });

                // Update the hidden input field with the selectedBooks array
                $('input[name="Books[]"]').val(JSON.stringify(selectedBooks));
            }

            // Checkbox change event
            $('input[type="checkbox"]').change(function () {
                updateSelectedBooks();
            });

            $('.cart-update').each(function () {
                var $row = $(this).closest('tr');
                var $quantity = $row.find('.quantity');
                var $increment = $(this).find('.increment');
                var $decrement = $(this).find('.decrement');
                var unitPrice = parseFloat($row.find('.xyz.unit-price').text());

                $increment.click(function () {
                    var currentQuantity = parseInt($quantity.text());
                    $quantity.text(currentQuantity + 1);
                    updatePrices();
                });

                $decrement.click(function () {
                    var currentQuantity = parseInt($quantity.text());
                    if (currentQuantity > 0) {
                        $quantity.text(currentQuantity - 1);
                        updatePrices();
                    }
                });

                // Function to update prices based on quantity
                function updatePrices() {
                    var quantity = parseInt($quantity.text());
                    var total = unitPrice * quantity;
                    $row.find('.xyz.total-price').text('$' + total);

                    // Update the selectedBooks array based on checkbox and quantity
                    updateSelectedBooks();
                }
            });

            // Set initial unit price and quantity values
            $('.quantity').each(function () {
                var initialQuantity = parseInt($(this).text());
                $(this).text(initialQuantity); // Initialize the displayed quantity
            });

            // Function to update prices based on quantity
            function updatePrices() {
                $('.cart-update').each(function () {
                    var $row = $(this).closest('tr');
                    var $quantity = $row.find('.quantity');
                    var quantity = parseInt($quantity.text());
                    var unitPrice = parseFloat($row.find('.xyz.unit-price').text());
                    var total = unitPrice * quantity;
                    $row.find('.xyz.total-price').text('$' + total);
                });

                // Update the selectedBooks array based on checkbox and quantity
                updateSelectedBooks();
            }

            // Increment and Decrement button click events
            $('.increment, .decrement').click(function () {
                updatePrices();
            });

            // Initial update
            updatePrices();

            // Modified selector for the Next button
            $('.useful-button .next-button').click(function () {
                // Trigger the checkbox change event when moving to the next step
                $('input[type="checkbox"]').trigger('change');
                var currentIndex = $tabs.tabs('option', 'active');
                showTab(currentIndex + 1);
            });
        });
    </script>
     <script>

        /**
         * Define a function to navigate betweens form steps.
         * It accepts one parameter. That is - step number.
         */
        const navigateToFormStep = (stepNumber) => {
            /**
             * Hide all form steps.
             */
            document.querySelectorAll(".form-step").forEach((formStepElement) => {
                formStepElement.classList.add("d-none");
            });
            /**
             * Mark all form steps as unfinished.
             */
            document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
                formStepHeader.classList.add("form-stepper-unfinished");
                formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
            });
            /**
             * Show the current form step (as passed to the function).
             */
            document.querySelector("#step-" + stepNumber).classList.remove("d-none");
            /**
             * Select the form step circle (progress bar).
             */
            const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
            /**
             * Mark the current form step as active.
             */
            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
            formStepCircle.classList.add("form-stepper-active");
            /**
             * Loop through each form step circles.
             * This loop will continue up to the current step number.
             * Example: If the current step is 3,
             * then the loop will perform operations for step 1 and 2.
             */
            for (let index = 0; index < stepNumber; index++) {
                /**
                 * Select the form step circle (progress bar).
                 */
                const formStepCircle = document.querySelector('li[step="' + index + '"]');
                /**
                 * Check if the element exist. If yes, then proceed.
                 */
                if (formStepCircle) {
                    /**
                     * Mark the form step as completed.
                     */
                    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                    formStepCircle.classList.add("form-stepper-completed");
                }
            }
        };
        /**
         * Select all form navigation buttons, and loop through them.
         */
        document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
            /**
             * Add a click event listener to the button.
             */
            formNavigationBtn.addEventListener("click", () => {
                /**
                 * Get the value of the step.
                 */
                const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
                /**
                 * Call the function to navigate to the target form step.
                 */
                navigateToFormStep(stepNumber);
            });
        });
    </script>
@endsection

