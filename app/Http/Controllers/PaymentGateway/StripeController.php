<?php

namespace App\Http\Controllers\PaymentGateway;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use App\Models\StripePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use App\Models\Cart;
use function Illuminate\Support\currency;

class StripeController extends Controller
{
    public function stripeCheckout(Request $request)
    {
        $books = [];
        $booksArray = json_decode($request->Books[0], true);
        $stripepayment = 0;
        $orderQantity = 0;
        $orderIds = [];
        if($booksArray)
        {
            foreach ($booksArray as $bookData) {
                $bookId = $bookData['bookId'];
                $quantity = $bookData['quantity'];
                $book = Book::find($bookId);
                if ($book) {
                    $orderQantity = $orderQantity + $quantity;
                    $stripepayment +=  $book->unit_price * $quantity;
                }
            }
            $key = config('stripe.key');
            $secret = config('stripe.secret');
            $stripe = new \Stripe\StripeClient($secret);
            $redirectUrl = route('checkout.success').'?session_id={CHECKOUT_SESSION_ID}';
            try {
                $response = $stripe->checkout->sessions->create([
                    'success_url' => $redirectUrl,
                    'customer_email' => Auth::user()->email,
                    'payment_method_types' => ['link', 'card'],
                    'line_items' => [
                        [
                            'price_data' => [
                                'product_data' => [
                                    'name' => 'book',
                                ],
                                'unit_amount' => 100 * $stripepayment,
                                'currency' => 'USD',
                            ],
                            'quantity' => 1,
                        ],
                    ],
                    'mode' => 'payment',
                    'allow_promotion_codes' => true,
                    'metadata' => [
                        'booksArray' => json_encode($booksArray),
                    ],
                ]);
                return redirect($response['url']);

            } catch (\Exception $e) {
                // Log the exception
                return redirect()->back()->with('error', 'Something wrong');            }
        }
        else
        {
            return redirect()->back()->with('error', 'please select book');
        }
    }
    public function stripeCheckoutSuccess(Request $request)
    {
        $secret = config('stripe.secret');
        $stripe = new \Stripe\StripeClient($secret);
        $sessionId = $request->session_id;
        $response = $stripe->checkout->sessions->retrieve($sessionId);
        $stripePayment =new StripePayment();
        $stripePayment->payment_id = $response['id'];
        $stripePayment->payer_email = $response['customer_email'];
        $stripePayment->amount = $response['amount_total'] / 100;
        $stripePayment->currency = $response['currency'];
        $stripePayment->payment_status = $response['payment_status'];
        $stripePayment->save();
        $booksData = $response['metadata']['booksArray'];
        $booksArray = json_decode($booksData,true);
        if($booksArray)
        {
            foreach ($booksArray as $bookData) {
                $bookId = $bookData['bookId'];
                $quantity = $bookData['quantity'];
                $book = Book::find($bookId);
                if ($book) {
                    $books['front_page'] = $book->front_page ?? '';
                    $books['total_price'] = $book->unit_price * $quantity;
                    $books['quantity'] = $quantity;
                    $books['unit_price'] = $book->unit_price;
                    $books['id'] = $book->id;

                    $order = new Order();
                    $order->user_name = Auth::user()->name;
                    $order->book_title = $book->title;
                    $order->status = "paid";
                    $order->unit_price = $book->unit_price;
                    $order->quantity = $quantity;
                    $order->total_price = $book->unit_price * $quantity;
                    $order->user_id = Auth::user()->id;
                    $order->save();
                    $cart = Cart::where('book_id',$bookId)->first();
                    $cart->delete();
                }
            }
        }
        return redirect()->route('user.dashboard')->with('message', 'payment successfully');

    }
}
