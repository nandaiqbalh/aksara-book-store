<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    public function bookAll()
    {
        $books = Book::latest()->get();

        return response()->json([
            'success' => 1,
            'message' => 'Sucessfully get book!',
            'book' => $books
        ]);
    }

    public function featuredBook()
    {
        $features = Book::where('featured', 1)->orderBy('id', 'DESC')->limit(5)->get();

        return response()->json([
            'success' => 1,
            'message' => 'Sucessfully get featured bood!',
            'book' => $features
        ]);
    }

    public function novelsBook()
    {
        $novels = Book::where('hot_deal', 1)->where('category_id', '==', 2)->orderBy('id', 'DESC')->limit(5)->get();

        return response()->json([
            'success' => 1,
            'message' => 'Sucessfully get hot deals book!',
            'book' => $novels
        ]);
    }
}
