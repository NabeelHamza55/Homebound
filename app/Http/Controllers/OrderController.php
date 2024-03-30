<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
     public function order(Request $request)
    {
        if ($request->ajax()) {
            $templates = Order::where('user_id', auth()->user()->id)->get();
            $data = DataTables()->of($templates)->make(true);
            return $data;
        }
        // $orders = Order::where('user_id', auth()->user()->id)->get();

        return view('UserDashboardComponents.order');
    }
    public function save_order(Request $request)
    {
        if ($request->ajax()) {
            $templates = Cart::where('user_id', auth()->user()->id)->get();
            $data = DataTables()->of($templates)->make(true);
            return $data;
        }
        return view('UserDashboardComponents.saveoder');
    }

    public function existing_order()
    {
        return view('UserDashboardComponents.existingorder');
    }
    public function total_order()
    {
        return view('UserDashboardComponents.totalorder');
    }
    public function cart(Request $request)
    {
        $books = [];
        $booksArray = json_decode($request->Books[0], true);
        if($booksArray)
        {
            foreach ($booksArray as $bookData) {
                $bookId = $bookData['bookId'];
                $quantity = $bookData['quantity'];
                $book = Book::find($bookId);
                if ($book) {
                    $currentBook = [];
                    $currentBook['front_page'] = $book->front_page ?? '';
                    $currentBook['total_price'] = $book->unit_price * $quantity;
                    $currentBook['quantity'] = $quantity;
                    $currentBook['unit_price'] = $book->unit_price;
                    $currentBook['id'] = $book->id;
                    $currentBook['title'] = $book->title;
                    $books[] = $currentBook;
                }
            }
            if ($books)
            {
                return view('order.card',compact('books'));
            }
        }
        else
        {
            return redirect()->back()->with('message','Please select book');
        }
    }
    public function checkout(Request $request)
    {
        $books = [];
        $booksArray = json_decode($request->Books[0], true);

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
                    $order->status = "pending";
                    $order->unit_price = $book->unit_price;
                    $order->quantity = $quantity;
                    $order->total_price = $book->unit_price * $quantity;
                    $order->user_id = Auth::user()->id;
                    $order->save();
                    $cart = Cart::where('book_id', $bookData['bookId'])->first();
                    $cart->delete();
                }
            }
        }
        else
        {
            return redirect()->back()->with('error', 'please select book');
        }
    }
}
