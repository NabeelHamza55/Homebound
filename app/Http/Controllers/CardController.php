<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function add_to_cart($id = null)
    {
        $book = Book::where('id',$id)->first();
        if ($book)
        {
            $alreadyCart = Cart::where('book_id',$book->id)->first();
            if($alreadyCart)
            {
                return back()->with('error','already cart book');
            }
            else
            {
                 $cartItem = new Cart();
            $cartItem->book_title = $book->title;
            $cartItem->book_price = $book->unit_price;
            $cartItem->front_page = $book->front_page ?? "";
            $cartItem->spine_page = $book->spine_page ?? "";
            $cartItem->back_page = $book->back_page ?? "";
            $cartItem->inner_pages = $book->inner_pages ?? "";
            $cartItem->user_id = auth()->user()->id;
            $cartItem->book_id = $book->id;
            $cartItem->save();
            return redirect()->route('book.list');
            }
           
        }
        else
        {
           return back()->with('error','book not found');
        }
    }
    public function delete_to_cart($id)
    {
        $cart = Cart::findOrFail($id);
        if($cart)
        {
            $cart->delete();
            return back()->with('success','successfully delete cart item');
        }
        else
        {
            return back()->with('error','cart item not found');
        }
    }
}
