<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function bookAdd()
    {
        $categories = Category::latest()->get();
        return view('backend.book.book_add', compact('categories'));
    }
}
