<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function bookAdd()
    {
        $categories = Category::latest()->get();
        return view('backend.book.book_add', compact('categories'));
    }

    public function  bookStore(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'category_id' => 'required',
            'book_name' => 'required',
            'book_author' => 'required',
            'book_code' => 'required' | 'unique',
            'book_quantity' => 'required',
            'book_page' => 'required',
            'book_language' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'description' => 'required',
            'book_image' => 'required | mimes:jpg,png,img',
        ], [
            'category_id.required' => 'Please input this field!',
            'book_name.required' => 'Please input this field!',
            'book_author.required' => 'Please input this field!',
            'book_code.required' => 'Please input this field!',
            'book_quantity.required' => 'Please input this field!',
            'book_page.required' => 'Please input this field!',
            'book_language.required' => 'Please input this field!',
            'selling_price.required' => 'Please input this field!',
            'discount_price.required' => 'Please input this field!',
            'description.required' => 'Please input this field!',
            'book_image.required' => 'Please input this field!',
            'book_image.mimes' => 'Your file format is not supported!',
        ]);

        $image = $request->file('book_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/books/image/' . $name_gen);
        $save_url = 'upload/books/image/' . $name_gen;

        Book::insert([
            'category_id' => $request->category_id,
            'book_name' => $request->book_name,
            'book_author' => $request->book_author,
            'book_code' => $request->book_code,
            'book_quantity' => $request->book_quantity,
            'book_page' => $request->book_page,
            'book_language' => $request->book_language,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'description' => $request->description,

            'book_image' => $save_url,

            'hot_deals' => $request->hot_deal,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deal' => $request->special_deal,

            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Succeeded to add the book!',
            'alert-type' => 'success'
        );

        return Redirect()->route('book.manage')->with($notification);
    } //end store method

    public function bookManage()
    {
        $books = Book::latest()->get();

        return view('backend.book.book_view', compact('books'));
    }
}
