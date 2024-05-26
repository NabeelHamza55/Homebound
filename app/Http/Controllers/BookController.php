<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('user_id', auth()->user()->id)->get();
        return view('Book.components.viewBooks', compact('books'));
    }
    public function create($id = null)
    {
        if ($id) {
            $books = Property::where('user_id', auth()->user()->id)->where('id', $id)->get();
        } else {
            $books = Property::where('user_id', auth()->user()->id)->get();
        }

        return view('Book.components.createBook', compact('books'));
    }
    public function saveImage($imageData, $publicPath, $index)
    {
        list($type, $data) = explode(';', $imageData);
        list(, $data) = explode(',', $data);
        $imageData = base64_decode($data);

        // Determine the extension from the data URL
        $imageExtension = '';
        if (strpos($type, 'image/jpeg') !== false) {
            $imageExtension = 'jpg';
        } elseif (strpos($type, 'image/png') !== false) {
            $imageExtension = 'png';
        } elseif (strpos($type, 'image/gif') !== false) {
            $imageExtension = 'gif';
        }

        $BookPictureName = time() . '_' . $index . '.' . $imageExtension; // You might want to generate a unique name
        $filePath = $publicPath . '/' . $BookPictureName;
        file_put_contents($filePath, $imageData);
        return $BookPictureName;
    }
    public function innerImages($images_arr, $publicPath)
    {
        $savedImages = [];
        $bookController = new BookController();
        foreach ($images_arr as $index => $image) {
            if (filter_var($image, FILTER_VALIDATE_URL)) {
                if (str_contains($image, 'ProfilePicture')) {
                    $savedImages[$index] = $bookController->extractFilename($image);
                } else {
                    $savedImages[$index] = $image;
                }
            } else {
                // If it's base64-encoded data, save the image
                list($type, $data) = explode(';', $image);
                list(, $data) = explode(',', $data);
                $imageData = base64_decode($data);

                // Determine the extension from the data URL
                $imageExtension = '';
                if (strpos($type, 'image/jpeg') !== false) {
                    $imageExtension = 'jpg';
                } elseif (strpos($type, 'image/png') !== false) {
                    $imageExtension = 'png';
                } elseif (strpos($type, 'image/gif') !== false) {
                    $imageExtension = 'gif';
                }

                $BookPictureName = time() . '_' . $index . '.' . $imageExtension; // You might want to generate a unique name
                $filePath = $publicPath . '/' . $BookPictureName;
                file_put_contents($filePath, $imageData);
                $savedImages[$index] = $BookPictureName;
            }
        }
        return $savedImages;
    }

    public function save(Request $request)
    {
        $images_arr = [];
        if ($request->has('inner1')) {
            $images_arr[] = $request->inner1;
        }
        if ($request->has('inner2')) {
            $images_arr[] = $request->inner2;
        }
        if ($request->has('inner3')) {
            $images_arr[] = $request->inner2;
        }
        $book = new Book();
        $publicPath = public_path('ProfilePicture');
        $front_page =  asset('book/front.jpg');
        $book->spine_page = $request->title;
        $back_page = asset('book/back.jpg');
        // dd($back_page);
        $bookController = new BookController();
        // if ($front_page) {
        //     if (filter_var($front_page, FILTER_VALIDATE_URL)) {
        //         $book->front_page = asset('book/front.jpg');
        //     } else {
        $book->front_page =  asset('book/front.jpg');
        //     }
        // }
        // if ($spine_page) {
        //     if (filter_var($spine_page, FILTER_VALIDATE_URL)) {
        //         $book->spine_page = $spine_page;
        //     } else {
        //         $book->spine_page = $bookController->saveImage($spine_page, $publicPath, 'spine');
        //     }
        // }
        // if ($back_page) {
        //     if (filter_var($back_page, FILTER_VALIDATE_URL)) {
        //         $book->back_page =asset('book/back.jpg');
        //     } else {
        $book->back_page = asset('book/back.jpg');
        //     }
        // }
        //        $images_string = $request->inner_page[0];
        if ($images_arr) {
            //            $images_arr = explode('*', $images_string);
            $savedImages = $bookController->innerImages($images_arr, $publicPath);
            $book->inner_pages = json_encode($savedImages);
        }
        $book->user_id = Auth::user()->id;
        $book->author = Auth::user()->name;
        $book->unit_price = $request->unit_price ?? '';
        $book->title = $request->title ?? '';
        $book->save();
        return $book;
        // return view('Book.components.previewBook',compact('book'));
    }
    public function edit($id)
    {
        $bookData = Book::find($id);
        $books = Property::where('user_id', auth()->user()->id)->get();
        return view('Book.components.editBook', compact(['books', 'bookData']));
    }
    public function extractFilename($url)
    {
        return basename($url);
    }
    public function update(Request $request)
    {
        $book = Book::find($request->book_id);
        if ($book) {
            $publicPath = public_path('ProfilePicture');
            $publicPath = str_replace('/public/', '/', $publicPath);
            $front_page = $request->front_page;
            $spine_page = $request->spine_page;
            $back_page = $request->back_page;
            $bookController = new BookController();
            if (filter_var($front_page, FILTER_VALIDATE_URL)) {
                if (str_contains($front_page, 'ProfilePicture')) {
                    $book->front_page = $bookController->extractFilename($front_page);
                } else {
                    $book->front_page = $front_page;
                }
            } else {
                $book->front_page = $bookController->saveImage($front_page, $publicPath, 'front');
            }
            if (filter_var($spine_page, FILTER_VALIDATE_URL)) {
                if (str_contains($spine_page, 'ProfilePicture')) {
                    $book->spine_page = $bookController->extractFilename($spine_page);
                } else {
                    $book->spine_page = $spine_page;
                }
            } else {
                $book->spine_page = $bookController->saveImage($spine_page, $publicPath, 'spine');
            }

            if (filter_var($back_page, FILTER_VALIDATE_URL)) {
                if (str_contains($back_page, 'ProfilePicture')) {
                    $book->back_page = $bookController->extractFilename($back_page);
                } else {
                    $book->back_page = $back_page;
                }
            } else {
                $book->back_page = $bookController->saveImage($back_page, $publicPath, 'back');
            }
            $images_string = $request->inner_page[0];
            if ($images_string) {
                $images_arr = explode('*', $images_string);
                $savedImages = $bookController->innerImages($images_arr, $publicPath);
                $book->inner_pages = json_encode($savedImages);
            }
            $book->user_id = Auth::user()->id;
            $book->author = Auth::user()->name;
            $book->unit_price = $request->unit_price ?? '';
            $book->title = $request->title ?? '';
            $book->save();
            return view('Book.components.previewBook', compact('book'));
        }
    }
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        $notification = [
            'statusCode' => 200,
            'Message' => 'delete Book  successfully',
        ];
        return back()->with($notification);
    }
    public function list()
    {
        $books = Cart::where('user_id', auth()->user()->id)->get();
        // dd($books);
        return view('Book.components.booklist', compact('books'));
    }
    public function preview($id)
    {
        $book = Book::where('id', $id)->first();
        return view('Book.components.previewBook', compact('book'));
    }
}
