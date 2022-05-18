<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function categoryView()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name.required' => 'Input Category Name!',
            'category_icon.required' => 'Input Category Icon!',

        ]);


        //  ELOQUENT ORM
        Category::insert([
            'category_name' => $request->category_name,
            'category_icon' => $request->category_icon,

        ]);

        $notification = array(
            'message' => 'Succeeded to add the category!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function categoryEdit($id)
    {
        $categories = Category::findOrFail($id);

        return view('backend.category.category_edit', compact('categories'));
    }

    public function categoryUpdate(Request $request)
    {
        $category_id = $request->id;
        $request->validate([
            'category_name' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name.required' => 'Input Category Name!',
            'category_icon.required' => 'Input Category Icon!',

        ]);

        // ELOQUENT ORM
        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Succeeded to update the category!',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.category')->with($notification);
    }
}
