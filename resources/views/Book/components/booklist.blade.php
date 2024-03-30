@extends('layout.header')

@section('main')
<style>
.add-to-cart-button {
   padding: 11px 73px;
    border-radius: 7px;
    background-color:#b48b52;
    color:white;
}
.add-to-cart-button:hover{
    background-color:#B48B52;
    color:white;
}
                        .back-button:hover{
                color:white;
            }
               .home-button:hover{
                color:white;
            }
            .social-button:hover{
                color:white;
            }
.del-icon:hover{
    cursor:pointer;
}
     
</style>
<section class="main-header">
    <nav class="navbar">
        <div class="container-fluid" style="background-color: white !important;">
            <div class="navbar-header logo">
                <a class="navbar-brand" href="{{route('user.dashboard')}}" >
                    <img src="{{asset('images/logo.png')}}"></a>
            </div>
        <!--    <div class="nav navbar-nav header-buttons" >-->
        <!--        <a href="{{route('view.book')}}" class="back-button">Back</a>-->
        <!--          <form method="post" action="{{ route('add.to.cart') }}">-->
        <!--    @csrf-->
        <!--    <div class="add-cart-text">-->
                <!-- Hidden fields for book IDs and quantities -->
        <!--        <input type="hidden" name="Books[]" value="">-->
        <!--        <button class='add-to-cart-button add-cart' type="submit">Add to Cart</button>-->
        <!--    </div>-->
        <!--</form>-->
        <!--        <a href="{{route('user.dashboard')}}" class="home-button">Home</a>-->
        <!--    </div>-->
        </div>
    </nav>
</section>
    <section class="products-title">
        <h3>Products</h3>
    </section>
    <section class="table-data">
        <table>
            <tr class="first-row">
                <th><input type="checkbox"></th>
                <th width="30%" style="text-align: left;">Book List</th>
                <th><span>Unit Price</span></th>
                <th><span>Quantity</span></th>
                <th><span>Total</span> </th>
                <th><span>Delete</span></th>
            </tr>
            @foreach($books as $book)
                <tr>
                    <td><input type="checkbox" value="{{$book->book_id}}"></td>
                    <td>
                        <div class="book-date">
                            @if($book['front_page'])
                                @if(str_contains($book['front_page'], 'https'))
                                    <div class="book-image"><img src="{{ $book['front_page'] }}" alt="no image"></div>
                                @else
                                    <div class="book-image"><img src="{{ asset('/ProfilePicture/'.$book['front_page']) }}" alt="no image"></div>
                                @endif
                            @endif
                            @if($book['book_title'])
                                <div class="book-text"><p>{{ $book['book_title'] }}</p></div>
                            @endif
                        </div>
                    </td>
                   @if($book['book_price'])
                   <td><span class="xyz unit-price">{{ $book['book_price'] }}</span></td>
                   @endif

                    <td>
                        <span class="cart-update">
                            <button class="decrement">-</button>
                            <span class="quantity">1</span>
                            <button class="increment">+</button>
                        </span>
                    </td>
                    <td><span class="xyz total-price total-price"></span></td>
                    <td><a class='del-icon' href="{{route('delete.cart.item', $book->id )}}"><img src="{{asset('images/trash-icon.png')}}" alt="Delete"></a></td>
                    
                </tr>
            @endforeach
        </table>
         <div class="nav navbar-nav header-buttons mt-5 mb-2" >
                <a href="{{route('view.book')}}" class="btn btn-danger">Back</a>
                  <form method="post" action="{{ route('add.to.cart') }}">
            @csrf
            <div class="add-cart-text">
                <!-- Hidden fields for book IDs and quantities -->
                <input type="hidden" name="Books[]" value="">
                <button class='add-to-cart-button add-cart' type="submit">Next</button>
            </div>
        </form>
            </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize an array to store selected book IDs and quantities
            var selectedBooks = [];
            $('.cart-update').each(function () {
                var $row = $(this).closest('tr');
                var $quantity = $row.find('.quantity');
                var $unitPrice = parseFloat($row.find('.unit-price').text());
                var $checkbox = $row.find('input[type="checkbox"]');
                var bookId = $checkbox.val();

                var $increment = $(this).find('.increment');
                var $decrement = $(this).find('.decrement');

                $increment.click(function () {
                    var currentQuantity = parseInt($quantity.text());
                    $quantity.text(currentQuantity + 1);
                    updatePrices();
                });

                $decrement.click(function () {
                    var currentQuantity = parseInt($quantity.text());
                    // Prevent decrementing below 1
                    if (currentQuantity > 1) {
                        $quantity.text(currentQuantity - 1);
                        updatePrices();
                    }
                });

                // Checkbox change event
                $checkbox.change(function () {
                    updatePrices();
                });

                // Function to update prices based on quantity
                function updatePrices() {
                    var quantity = parseInt($quantity.text());
                    var total = $unitPrice * quantity;
                    $row.find('.total-price').text('$' + total);

                    // Update the selectedBooks array based on checkbox and quantity
                    if ($checkbox.is(':checked')) {
                        // Check if the book is already in the array, and update the quantity
                        var existingBookIndex = selectedBooks.findIndex(item => item.bookId === bookId);
                        if (existingBookIndex !== -1) {
                            selectedBooks[existingBookIndex].quantity = quantity;
                        } else {
                            // Add a new entry to the array
                            selectedBooks.push({ bookId: bookId, quantity: quantity });
                        }
                    } else {
                        // Remove the book from the array if unchecked
                        selectedBooks = selectedBooks.filter(item => item.bookId !== bookId);
                    }

                    // Update the hidden input field with the selectedBooks array
                    $('input[name="Books[]"]').val(JSON.stringify(selectedBooks));
                }
            });
        });
    </script>
@endsection
